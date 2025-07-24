<?php
namespace App\Services\Student;

use App\Models\HelpRequest;
use App\Models\HelpRequestComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HelpRequestCommentService
{
    public function store(array $data)
    {
        DB::beginTransaction();

        try {
            $filePath = null;

            if (isset($data['file'])) {
                $filePath = $data['file']->store('help_comments', 'public');
            }

            $comment = HelpRequestComment::create([
                'user_id'         => Auth::id(),
                'help_request_id' => $data['help_request_id'],
                'content'         => $data['content'],
                'file'            => $filePath,
            ]);

            DB::commit();

            // حذف الكاش عند إضافة تعليق
            $this->forgetHelpRequestCache($comment->help_request_id);

            return $comment;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating help request comment: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'help_request_id' => $data['help_request_id'],
                'exception' => $e,
            ]);
            throw $e;
        }
    }

    public function updateComment(HelpRequestComment $comment, array $data)
    {
        $comment->update($data);

        // حذف الكاش عند تحديث تعليق
        $this->forgetHelpRequestCache($comment->help_request_id);

        return $comment;
    }

    public function deleteComment(HelpRequestComment $comment)
    {
        $helpRequestId = $comment->help_request_id;

        DB::beginTransaction();
        try {
            $comment->delete();

            DB::commit();

            // حذف الكاش عند حذف تعليق
            $this->forgetHelpRequestCache($helpRequestId);

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting help request comment: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'help_request_id' => $helpRequestId,
                'exception' => $e,
            ]);
            throw $e;
        }
    }

    // دالة لحذف الكاش المرتبط بطلب المساعدة
    protected function forgetHelpRequestCache($helpRequestId)
    {
        // استرجاع الكلية والجامعة من الطلب
        $helpRequest = HelpRequest::findOrFail($helpRequestId);
        $collegeId = $helpRequest->college_id;
        $universityId = $helpRequest->university_id;

        // حذف الكاش باستخدام الكلية والجامعة
        $cacheKey = "help_requests_college_{$collegeId}_university_{$universityId}";
        Cache::forget($cacheKey);
    }
}
