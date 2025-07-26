<?php

namespace App\Services\Admin;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CourseService
{
    public function storeCourse($data)
    {
        $user = Auth::user()->student;
        Course::create([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
            'code' => $data['code'],
            'description' => $data['description'],
            'university_id' => Auth::user()->student->university_id, // Assuming the authenticated user is a student and has a university
            'college_id' => Auth::user()->student->college_id, // Assuming the authenticated user is a student and has a university
            'major_id' => Auth::user()->student->major_id,
        ]);
        $cacheKey = "courses_college_{$user->college_id}_university_{$user->university_id}";
        Cache::forget($cacheKey);
    }

    public function getCourses()
    {
        $universityId = Auth::user()->student->university_id;
        $collegeId = Auth::user()->student->college_id;
        $cacheKey = "courses_college_{$collegeId}_university_{$universityId}";
        return Cache::remember($cacheKey, now()->addMinutes(60), function () use ($collegeId, $universityId) {
            return Course::where('university_id', $universityId)
                ->where('college_id', $collegeId)
                ->get();
        });
    }

    public function getCourseById($course_id)
    {
        $universityId = Auth::user()->student->university_id;
        $collegeId = Auth::user()->student->college_id;
        $cacheKey = "courses_college_{$collegeId}_university_{$universityId}";

        // نحاول نجيب الكورسات من الكاش
        $courses = Cache::get($cacheKey);

        if ($courses) {
            // نبحث عن الكورس المطلوب داخل مجموعة الكورسات المخزنة
            return $courses->firstWhere('id', $course_id) ?? abort(404, 'Course not found in cache');
        }

        // fallback: لو ما كان موجود بالكاش، نجيب الكورس من قاعدة البيانات
        return Course::findOrFail($course_id);
    }


    public function updateCourse($data, $course_id)
    {
        $user = Auth::user()->student;

        Course::where('id', $course_id)->update([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
            'code' => $data['code'],
            'description' => $data['description'],
            'university_id' => $user->university_id,
            'college_id' => $user->college_id,
            'major_id' => $user->major_id,
        ]);

        $cacheKey = "courses_college_{$user->college_id}_university_{$user->university_id}";
        Cache::forget($cacheKey);
    }


    public function deleteCourse($course_id)
    {
        $user = Auth::user()->student;

        Course::where('id', $course_id)->delete();

        $cacheKey = "courses_college_{$user->college_id}_university_{$user->university_id}";
        Cache::forget($cacheKey);
    }
}
