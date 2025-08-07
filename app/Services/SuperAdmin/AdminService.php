<?php

namespace App\Services\SuperAdmin;

use App\Models\User;
use App\Role\UserRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class AdminService
{
    public function fetchUsers(?string $search = null, int $perPage = 15)
    {
        if (!$search) {
            // Cache key مع رقم الصفحة
            $page = request()->get('page', 1);
            $cacheKey = "admins_page_{$page}_perpage_{$perPage}";

            return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($perPage) {
                return User::where('is_admin', true)->paginate($perPage);
            });
        }

        // إذا فيه بحث، لا نستخدم الكاش
        $query = User::query();

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        });

        return $query->paginate($perPage);
    }

    public function promoteStudentToAdmin(User $user)
    {
        if ($user->user_type !== UserRole::STUDENT) {
            throw new \Exception('This user is not a student.');
        }

        DB::beginTransaction();
        try {
            // $user->user_type = UserRole::ADMIN;
            $user->is_admin = true;

            $user->save();

            DB::commit();

            // حذف كل الكاش المرتبط بالمدراء بعد التعديل
            $this->clearAdminCache();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function revokeAdmin(User $user): void
    {
        if ($user->is_admin == false) {
            throw new \DomainException('This user is not an admin.');
        }

        DB::beginTransaction();
        try {
            $user->update([
                // 'user_type' => 'student',
                'is_admin' => false,
            ]);
            DB::commit();

            // حذف كل الكاش المرتبط بالمدراء بعد التعديل
            $this->clearAdminCache();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function clearAdminCache()
    {
        // إذا عندك كثير صفحات، الحل الأمثل استخدام Cache tags (لو Redis يدعمها)
        // لكن بشكل مبسط نحذف الكاشات الشائعة (مثلاً أول 5 صفحات)
        for ($page = 1; $page <= 5; $page++) {
            $cacheKey = "admins_page_{$page}_perpage_15";
            Cache::forget($cacheKey);
        }
    }
}
