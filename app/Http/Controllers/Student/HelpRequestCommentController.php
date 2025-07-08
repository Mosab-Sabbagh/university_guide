<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpRequestCommentRequest;
use App\Services\Student\HelpRequestCommentService;
use Illuminate\Http\Request;

class HelpRequestCommentController extends Controller
{
    public $service;
    public function __construct(HelpRequestCommentService $helpRequestCommentService)
    {
        $this->service = $helpRequestCommentService ;
    }
    
    public function store(HelpRequestCommentRequest $request, $helpRequestId)
    {
        $validated = $request->validated();
        $validated['help_request_id'] = $helpRequestId;

        $this->service->store($validated);

        return redirect()->back()->with('success', 'تم إضافة التعليق بنجاح');
    }

    
}
