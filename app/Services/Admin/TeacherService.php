<?php

namespace App\Services\Admin;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TeacherService
{
    public function storeTeacher($data)
    {
        return DB::transaction(function () use ($data) {
            try {
                $profileImagePath = null;

                // Handle profile picture upload
                if (isset($data['profile_picture']) && $data['profile_picture'] instanceof \Illuminate\Http\UploadedFile) {
                    $profileImagePath = $data['profile_picture']->store('teachers', 'public');
                }

                // Create new teacher
                $teacher = new Teacher();
                $teacher->name = $data['name'];
                $teacher->email = $data['email'];
                $teacher->biography = $data['biography'];
                $teacher->profile_picture = $profileImagePath;
                $teacher->phone = $data['phone'];
                $teacher->university_id = Auth::user()->student->university_id;
                $teacher->college_id = Auth::user()->student->college_id;
                $teacher->save();

                // Assign courses to teacher
                if (!empty($data['course_ids']) && is_array($data['course_ids'])) {
                    $teacher->courses()->attach($data['course_ids']);
                }
                // Clear cache for teachers
                Cache::forget("teachers_all");
                return $teacher;
            } catch (\Exception $e) {
                // Delete the uploaded file if something went wrong
                if (isset($profileImagePath)) {
                    Storage::disk('public')->delete($profileImagePath);
                }
                throw $e; // Re-throw the exception after cleanup
            }
        });
    }

    public function getTeachers($search = null)
    {
        $cacheKey = $search
            ? "teachers_search_" . md5($search)  
            : "teachers_all";

        return Cache::remember($cacheKey, now()->addHour(), function () use ($search) {
            return Teacher::with('courses')
                ->when($search, function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                })
                ->where('university_id', Auth::user()->student->university_id)
                ->where('college_id', Auth::user()->student->college_id)
                ->paginate(20);
        });
    }

    public function getTeacherById($id)
    {
        return Teacher::with('courses')->findOrFail($id);
    }

    public function updateTeacher($id, $data)
    {
        return DB::transaction(function () use ($id, $data) {
            try {
                $teacher = Teacher::findOrFail($id);
                $profileImagePath = $teacher->profile_picture;

                // Handle profile picture upload
                if (isset($data['profile_picture']) && $data['profile_picture'] instanceof \Illuminate\Http\UploadedFile) {
                    if ($profileImagePath) {
                        Storage::disk('public')->delete($profileImagePath);
                    }
                    $profileImagePath = $data['profile_picture']->store('teachers', 'public');
                }

                // Update teacher details
                $teacher->name = $data['name'];
                $teacher->email = $data['email'];
                $teacher->biography = $data['biography'];
                $teacher->profile_picture = $profileImagePath;
                $teacher->phone = $data['phone'];
                $teacher->save();

                // Sync courses
                if (!empty($data['course_ids']) && is_array($data['course_ids'])) {
                    $teacher->courses()->sync($data['course_ids']);
                }

                // Clear cache for teachers
                Cache::forget("teachers_all");

                return $teacher;
            } catch (\Exception $e) {
                // Delete the uploaded file if something went wrong
                if (isset($profileImagePath)) {
                    Storage::disk('public')->delete($profileImagePath);
                }
                throw $e; // Re-throw the exception after cleanup
            }
        });
    }

    public function deleteTeacher($id)
    {
        return DB::transaction(function () use ($id) {
            $teacher = Teacher::findOrFail($id);
            $profileImagePath = $teacher->profile_picture;

            // Delete the teacher's profile picture if it exists
            if ($profileImagePath) {
                Storage::disk('public')->delete($profileImagePath);
            }

            // Detach courses and delete the teacher
            $teacher->courses()->detach();
            $teacher->delete();

            // Clear cache for teachers
            Cache::forget("teachers_all");

            return true;
        });
    }

}
