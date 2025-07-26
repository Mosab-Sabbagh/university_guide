<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Student\SummaryService;
use Illuminate\Http\Request;

class SummaryAdminController extends Controller
{
    public $summaryService;
    public function __construct(SummaryService $summaryService)
    {
        $this->summaryService = $summaryService;
    }
    public function index(Request $request)
    {
        $summaries = $this->summaryService->getSummaries();
        return view('student.admin.summary.index' ,compact('summaries'));
    }
    
    public function destroy($id)
    {
        try{
            $this->summaryService->deleteSummary($id);
            return redirect()->route('admin.summaries.index')->with('success', 'تم حذف الملخص بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('admin.summaries.index')->with('error', 'حدث خطأ أثناء حذف الملخص');
        }
    }
}
