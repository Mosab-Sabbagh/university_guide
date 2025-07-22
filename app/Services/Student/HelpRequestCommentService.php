<?php

namespace App\Services\Student;

use App\Models\HelpRequestComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        return $comment;
    }

    public function deleteComment(HelpRequestComment $comment)
    {
        return $comment->delete();
    }
}
