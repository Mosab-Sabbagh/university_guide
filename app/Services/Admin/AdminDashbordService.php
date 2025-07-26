<?php

namespace App\Services\Admin;

use App\Models\Student;
use App\Models\Course;
use App\Models\Summary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AdminDashbordService
{

    public function getDashboardData()
    {
        try {
            $admin = Auth::user()->student;
            $cacheKey = "dashboard_stats_{$admin->college_id}_{$admin->university_id}";

            return Cache::remember($cacheKey, now()->addHours(6), function () use ($admin) {
                return [
                    'students' => $this->getStudentCount($admin),
                    'courses' => $this->getCourseCount($admin),
                    'summaries' => $this->getSummaryCount($admin)
                ];
            });
        } catch (\Exception $e) {
            Log::error("Failed to fetch dashboard data: " . $e->getMessage());
            return $this->getDefaultDashboardData();
        }
    }

    protected function getStudentCount($admin)
    {
        return Student::where('college_id', $admin->college_id)
            ->where('university_id', $admin->university_id)
            ->count();
    }

    protected function getCourseCount($admin)
    {
        return Course::where('college_id', $admin->college_id)
            ->count();
    }

    protected function getSummaryCount($admin)
    {
        return Summary::where('college_id', $admin->college_id)
            ->count();
    }


    protected function getDefaultDashboardData()
    {
        return [
            'students' => 0,
            'courses' => 0,
            'summaries' => 0
        ];
    }

    public static function clearDashboardCache($collegeId, $universityId)
    {
        $cacheKey = "dashboard_stats_{$collegeId}_{$universityId}";
        Cache::forget($cacheKey);
    }
}
