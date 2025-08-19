<?php
namespace App\Services\SuperAdmin;

use App\Models\University;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UniversityService
{
    const CACHE_TTL = 180; // 3 ساعات للبيانات الأساسية
    const SHORT_CACHE_TTL = 30; // 30 دقيقة للبيانات المؤقتة
    const DETAILS_CACHE_TTL = 240; // 4 ساعات للتفاصيل

    public function getAllUniversities($search = null)
    {
        $cacheKey = 'universities_list:' . md5(request()->fullUrlWithQuery(['search' => $search]));

        return Cache::remember($cacheKey, now()->addMinutes(self::SHORT_CACHE_TTL), function () use ($search) {
            $query = University::query();

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name_ar', 'like', '%' . $search . '%')
                      ->orWhere('name_en', 'like', '%' . $search . '%');
                });
            }

            return $query->paginate(10)->withQueryString();
        });
    }

    public function getAllUniversitiesWithoutPagination()
    {
        return Cache::remember('universities:all', now()->addMinutes(self::CACHE_TTL), function () {
            return University::orderBy('name_ar')->get();
        });
    }

    public function getUniversityById($id)
    {
        return Cache::remember("university:{$id}", now()->addMinutes(self::CACHE_TTL), function () use ($id) {
            return University::findOrFail($id);
        });
    }

    public function createUniversity(array $data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['logo']) && $data['logo'] instanceof \Illuminate\Http\UploadedFile) {
                $data['logo'] = $this->storeUniversityLogo($data['logo']);
            }

            $university = University::create($data);

            DB::commit();

            $this->clearUniversitiesCache();
            \App\Http\Controllers\SuperAdmin\HomeController::clearDashboardCache();
            return $university;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('University creation failed: ' . $e->getMessage());
            
            // حذف الملف إذا تم تحميله وفشلت العملية
            if (isset($data['logo'])) {
                $this->deleteLogoFile($data['logo']);
            }
            
            throw $e;
        }
    }

    public function updateUniversity(University $university, array $data)
    {
        try {
            DB::beginTransaction();

            $oldLogo = $university->logo;

            if (isset($data['logo']) && $data['logo'] instanceof \Illuminate\Http\UploadedFile) {
                $data['logo'] = $this->storeUniversityLogo($data['logo']);
            }

            $result = $university->update($data);

            DB::commit();

            // حذف الملف القديم إذا تم تحديث الشعار
            if (isset($data['logo']) && $oldLogo) {
                $this->deleteLogoFile($oldLogo);
            }

            $this->clearUniversityCache($university->id);
            $this->clearUniversitiesCache();
            \App\Http\Controllers\SuperAdmin\HomeController::clearDashboardCache();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('University update failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public function deleteUniversity(University $university)
    {
        try {
            DB::beginTransaction();

            $id = $university->id;
            $logoPath = $university->logo;
            
            $result = $university->delete();

            DB::commit();

            // حذف ملف الشعار إذا كان موجوداً
            if ($logoPath) {
                $this->deleteLogoFile($logoPath);
            }

            $this->clearUniversityCache($id);
            $this->clearUniversitiesCache();
            \App\Http\Controllers\SuperAdmin\HomeController::clearDashboardCache();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('University deletion failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getUniversityWithDetails($universityId): University
    {
        return Cache::remember("university:details:{$universityId}", now()->addMinutes(self::DETAILS_CACHE_TTL), function () use ($universityId) {
            return University::with(['colleges.majors'])->findOrFail($universityId);
        });
    }

    public function getCollegesByUniversityId($id)
    {
        return Cache::remember("university:colleges:{$id}", now()->addMinutes(self::CACHE_TTL), function () use ($id) {
            return University::with('colleges')->findOrFail($id)->colleges;
        });
    }

    /**
     * تخزين شعار الجامعة
     */
    protected function storeUniversityLogo(\Illuminate\Http\UploadedFile $logo): string
    {
        $path = $logo->store('universities/logos', 'public');
        return $path;
    }

    /**
     * حذف ملف الشعار
     */
    protected function deleteLogoFile(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * مسح كاش الجامعة المحددة
     */
    protected function clearUniversityCache(int $universityId): void
    {
        Cache::forget("university:{$universityId}");
        Cache::forget("university:details:{$universityId}");
        Cache::forget("university:colleges:{$universityId}");
    }

    /**
     * مسح كاش قوائم الجامعات
     */
    protected function clearUniversitiesCache(): void
    {
        Cache::forget('universities:all');
        
        // يمكن إضافة مسح للكاش الخاص بالبحث إذا لزم الأمر
        // هذا يتطلب تنفيذ أكثر تعقيداً لتتبع مفاتيح الكاش
    }
}