<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\Admin\CourseService;
use App\Services\Admin\TeacherService;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    public $teacherService;
    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }
    public function index( CourseService $courseService)
    {
        try{
            $search = request('search');
            $courses = $courseService->getCourses();
            $teachers = $this->teacherService->getTeachers($search);
        return view('student.admin.teachers.index', compact('courses','teachers'));
        } catch (\Exception $e) {
            return redirect()->route('admin.teachers.index')->with('error', 'حدث خطأ أثناء تحميل المدرسين');
        }
    }


    public function store(TeacherRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $this->teacherService->storeTeacher($validatedData);
            return redirect()->route('admin.teachers.index')->with('success', 'تم إضافة المدرس بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء إضافة المدرس: ' . $e->getMessage()]);
        }
    }

    public function edit($teacher_id,CourseService $courseService)
    {
        try {
            $teacher = $this->teacherService->getTeacherById($teacher_id);
            $courses = $courseService->getCourses();
            return view('student.admin.teachers.edit', compact('teacher', 'courses'));
        } catch (\Exception $e) {
            return redirect()->route('admin.teachers.index')->with('error', 'حدث خطأ أثناء تحميل بيانات المدرس');
        }
    }

    public function update(TeacherRequest $request, $teacher_id)
    {
        try {
            $validatedData = $request->validated();
            $this->teacherService->updateTeacher($teacher_id, $validatedData);
            return redirect()->route('admin.teachers.index')->with('success', 'تم تحديث بيانات المدرس بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحديث بيانات المدرس: ' . $e->getMessage()]);
        }
    }

    public function destroy($teacher_id)
    {
        try {
            $this->teacherService->deleteTeacher($teacher_id);
            return redirect()->route('admin.teachers.index')->with('success', 'تم حذف المدرس بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء حذف المدرس: ' . $e->getMessage()]);
        }
    }
}
