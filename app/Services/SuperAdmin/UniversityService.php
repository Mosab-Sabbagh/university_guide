<?php
namespace App\Services\SuperAdmin;

use App\Models\University;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class UniversityService
{
    public function getAllUniversities($search = null)
    {
        $query = University::query();

        if ($search) {
            $query->where('name_ar', 'like', '%' . $search . '%');
        }

        return $query->paginate(10)->withQueryString();
    }

    public function getAllUniversitiesWithoutPagination()
    {
        return Cache::remember('universities_all', now()->addHours(6), function () {
            return University::get();
        });
    }

    public function getUniversityById($id)
    {
        return Cache::remember("university_{$id}", now()->addHours(2), function () use ($id) {
            return University::findOrFail($id);
        });
    }

    public function createUniversity(array $data)
    {
        try {
            DB::beginTransaction();

            $university = University::create($data);

            DB::commit();

            // حذف الكاش عند الإضافة
            Cache::forget('universities_all');

            return $university;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateUniversity(University $university, array $data)
    {
        try {
            DB::beginTransaction();

            $result = $university->update($data);

            DB::commit();

            // حذف الكاش المرتبط بعد التحديث
            Cache::forget("university_{$university->id}");
            Cache::forget("university_details_{$university->id}");
            Cache::forget("university_{$university->id}_colleges");
            Cache::forget('universities_all');

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteUniversity(University $university)
    {
        try {
            DB::beginTransaction();

            $id = $university->id;
            $result = $university->delete();

            DB::commit();

            // حذف الكاش المرتبط بعد الحذف
            Cache::forget("university_{$id}");
            Cache::forget("university_details_{$id}");
            Cache::forget("university_{$id}_colleges");
            Cache::forget('universities_all');

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getUniversityWithDetails($university): University
    {
        return Cache::remember("university_details_{$university}", now()->addHours(4), function () use ($university) {
            return University::with(['colleges.majors'])->findOrFail($university);
        });
    }

    public function getCollegesByUniversityId($id)
    {
        return Cache::remember("university_{$id}_colleges", now()->addHours(3), function () use ($id) {
            return University::with('colleges')->findOrFail($id)->colleges;
        });
    }
}
