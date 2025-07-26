<?php

namespace App\Services\Student;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CourseGuideService
{

    public function getCourseGuide($search = null)
    {
        $universityId = Auth::user()->student->university_id;
        $collegeId = Auth::user()->student->college_id;
        $cacheKey = "courses_guide_{$collegeId}_university_{$universityId}" . ($search ? "_search_{$search}" : '');

        return Cache::remember($cacheKey, now()->addMinutes(60), function () use ($collegeId, $universityId, $search) {
            $query = Course::select('id', 'name_ar', 'description')
                ->where('university_id', $universityId)
                ->where('college_id', $collegeId);

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name_ar', 'like', "%{$search}%")
                        ->orWhere('code', 'like', "%{$search}%");
                });
            }

            return $query->get();
        });
    }
}
