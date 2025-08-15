<?php

namespace App\Services\Student;

use App\Events\BookRequestAccepted;
use App\Models\BookPost;
use App\Models\BookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookRequestService
{
    public function storeBookRequest($data)
    {
        return BookRequest::create([
            'user_id' => Auth::id(),
            'book_post_id' => $data['book_post_id'],
            'message' => $data['message'],
        ]);
    }

    public function getBookRequestByPostId($post_id)
    {
        return BookRequest::where('book_post_id', $post_id)
            ->whereHas('bookPost', function ($query) {
                $query->where('user_id', Auth::user()->id); // يجيب بس لو الكتاب تبع المستخدم الحالي
            })
            ->with(['user', 'bookPost'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function acceptRequest($data)
    {
        return DB::transaction(function () use ($data) {
            $bookRequest = BookRequest::findOrFail($data['request_id']);
            $bookRequest->status = 'accepted';
            $bookRequest->save();

            event(new BookRequestAccepted($bookRequest));

            return $bookRequest;
        });
    }

    public function getMyRequests($user_id)
    {
        return BookRequest::where('user_id', $user_id)
            ->with(['bookPost'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
