<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpRequestRequest;
use App\Services\Student\HelpRequestService;
use Illuminate\Http\Request;

class HelpRequestController extends Controller
{

    public $helpRequestService;
    public function __construct(HelpRequestService $helpRequestService)
    {
        $this->helpRequestService = $helpRequestService;
    }

    public function index()
    {
        try {
            $helpRequests = $this->helpRequestService->getAllHelpRequests();
            return view('student.help_requests.index', compact('helpRequests'));
        } catch (\Exception $e) {
            return redirect()->route('student.help_requests.index')->with('error', 'حدث خطأ أثناء جلب البيانات');
        }
    }


    public function store(HelpRequestRequest $request)
    {
        $request->validated(); 
        try {
            $this->helpRequestService->store($request->all());
            return redirect()->route('student.help_requests.index')->with('success', 'تم الاضافة بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('student.help_requests.index')->with('error', 'حدث خطأ أثناء الإضافة');
        }
    }
}
