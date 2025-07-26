<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\SummaryRequest;
use App\Models\Summary;
use App\Services\Admin\CourseService;
use App\Services\Student\SummaryService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SummaryController extends Controller
{
    public $summaryService;
    public function __construct(SummaryService $summaryService)
    {
        $this->summaryService = $summaryService;
    }

    public function index(CourseService $courseService, Request $request)
    {
        $courses = $courseService->getCourses();
        $summaries = $this->summaryService->getSummaries();
        return view('student.summary.index', compact('courses', 'summaries'));
    }

    public function store(SummaryRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $this->summaryService->storeSummary($validatedData);
            return redirect()->route('student.summaries.index')->with('success', 'تم اضافة الملخص  بنجاح');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('student.summaries.index')->with('error', 'حدث خطأ أثناء الإضافة');
        }
    }

    public function download($id)
    {
        try {
            $downloadInfo = $this->summaryService->getDownloadInfoById($id);
            return response()->download($downloadInfo['path'], $downloadInfo['name']);
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('student.summaries.index')->with('error', 'حدث خطأ أثناء تحميل الملف');
        }
    }
}
