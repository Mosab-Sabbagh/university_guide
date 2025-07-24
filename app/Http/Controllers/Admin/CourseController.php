<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Services\Admin\CourseService;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    public function index()
    {
        try{
            $courses = $this->courseService->getCourses();
            return view('student.admin.courses.index', compact('courses'));
        }catch(Exception $e){
            Log::error('Error fetching courses: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ أثناء جلب الكورسات: ' );
        }
    }


    public function store(CourseRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $this->courseService->storeCourse($validatedData);
            return redirect()
                ->route('admin.courses.index')
                ->with('success', 'تم إضافة المساق بنجاح');
        } catch (Exception $e) {
            Log::error('Error storing course: ' . $e->getMessage(), [
                'data' => $validatedData,
            ]);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة المساق: ');
        }
    }

    public function edit($course_id)
    {
        try {
            $course = $this->courseService->getCourseById($course_id);
            return view('student.admin.courses.edit', compact('course'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'حدث  خطأ أو أن المساق غير موجود ');
        }
    }

    public function update(CourseRequest $request, $course_id)
    {
        $validatedData = $request->validated();
        try {
            $this->courseService->updateCourse($validatedData, $course_id);
            return redirect()
                ->route('admin.courses.index')
                ->with('success', 'تم تحديث المساق بنجاح');
        } catch (Exception $e) {
            Log::error('Error updating course: ' . $e->getMessage(), [
                'data' => $validatedData,
            ]);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث المساق: ');
        }
    }

    public function destroy($course_id)
    {
        try {
            $this->courseService->deleteCourse($course_id);
            return redirect()
                ->route('admin.courses.index')
                ->with('success', 'تم حذف المساق بنجاح');
        } catch (Exception $e) {
            Log::error('Error deleting course: ' . $e->getMessage(), [
                'course_id' => $course_id,
            ]);
            return redirect()
                ->back()
                ->with('error', 'حدث خطأ أثناء حذف المساق: ');
        }
    }
}
