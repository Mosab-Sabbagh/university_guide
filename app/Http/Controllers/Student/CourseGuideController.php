<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\Student\CourseGuideService;
use Illuminate\Http\Request;

class CourseGuideController extends Controller
{
    //دليل المساقات
    public $courseGuideService;
    public function __construct(CourseGuideService $courseGuideService)
    {
        $this->courseGuideService = $courseGuideService;
    }

    public function index()
    {
        $search = request('search');
        $courses = $this->courseGuideService->getCourseGuide($search);
        return view('student.course_guide.index', compact('courses'));
    }
}
