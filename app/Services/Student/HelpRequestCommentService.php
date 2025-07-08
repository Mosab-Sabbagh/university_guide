<?php 
namespace App\Services\Student;

use App\Models\HelpRequestComment;
use Illuminate\Support\Facades\Auth;

Class HelpRequestCommentService{
// HelpRequestCommentService.php
public function store(array $data)
{
    $filePath = null;

    if (isset($data['file'])) {
        $filePath = $data['file']->store('help_comments', 'public');
    }

    return HelpRequestComment::create([
        'user_id'          => Auth::id(),
        'help_request_id'  => $data['help_request_id'],
        'content'          => $data['content'],
        'file'             => $filePath,
    ]);
}

}