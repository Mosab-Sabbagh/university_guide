<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\Admin\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    
    public function index(TeacherService $teacherService)
    {
        try {
            $search = request('search');
            $teachers = $teacherService->getTeachers($search);
            return view('student.teachers.index', compact('teachers'));
        } catch (\Exception $e) {
            return redirect()->route('student.teachers.index')->with('error', 'حدث خطأ أثناء تحميل المدرسين');
        }
    }
    
    public function show(TeacherService $teacherService,$id)
    {
        try {
            $teacher = $teacherService->getTeacherById($id);
            return view('student.teachers.show', compact('teacher'));
        } catch (\Exception $e) {
            return redirect()->route('student.teachers.index')->with('error', 'حدث خطأ أثناء تحميل بيانات المدرس');
        }
    }
}
