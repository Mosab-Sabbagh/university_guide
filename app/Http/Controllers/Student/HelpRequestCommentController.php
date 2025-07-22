<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpRequestCommentRequest;
use App\Models\HelpRequestComment;
use App\Services\Student\HelpRequestCommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpRequestCommentController extends Controller
{
    public $service;
    public function __construct(HelpRequestCommentService $helpRequestCommentService)
    {
        $this->service = $helpRequestCommentService;
    }

    public function store(HelpRequestCommentRequest $request, $helpRequestId)
    {
        $validated = $request->validated();
        $validated['help_request_id'] = $helpRequestId;

        try {
            $comment = $this->service->store($validated);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'content' => $comment->content,
                    'user_name' => $comment->user->name,
                    'comment_id' => $comment->id,
                    'is_owner' => Auth::id() === $comment->user_id,
                ]);
            }

            // return redirect()->back()->with('success', 'تم إضافة التعليق بنجاح');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['error' => 'فشل إضافة التعليق'], 500);
            }

            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة التعليق');
        }
    }

    public function update(Request $request, $helpRequestId, HelpRequestComment $comment)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        try {
            $updatedComment = $this->service->updateComment($comment, [
                'content' => $request->content,
            ]);

            return response()->json([
                'success' => true,
                'content' => $updatedComment->content,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'فشل التحديث'], 500);
        }
    }

    public function destroy($helpRequestId, HelpRequestComment $comment)
    {
        try {
            $this->service->deleteComment($comment);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'فشل الحذف'], 500);
        }
    }
}
