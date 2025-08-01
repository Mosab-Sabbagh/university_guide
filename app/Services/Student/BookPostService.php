<?php

namespace App\Services\Student;

use App\Models\BookPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BookPostService
{


    public function getAllBookPosts($search = null)
    {
        $cacheKey = 'book_posts_' . Auth::user()->student->university_id . '_' . Auth::user()->student->college_id;

        if ($search) {
            // إذا كان هناك بحث، لا نستخدم الكاش ونبحث مباشرة
            return BookPost::where('university_id', Auth::user()->student->university_id)
                ->where('college_id', Auth::user()->student->college_id)
                ->where('title', 'like', '%' . $search . '%')
                ->with(['user', 'requests'])
                ->withCount('requests')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // إذا لم يكن هناك بحث، نستخدم الكاش
        return Cache::remember($cacheKey, now()->addMinutes(60), function () {
            return BookPost::where('university_id', Auth::user()->student->university_id)
                ->where('college_id', Auth::user()->student->college_id)
                ->with(['user', 'requests'])
                ->withCount('requests')
                ->orderBy('created_at', 'desc')
                ->get();
        });
    }

    public function createBookPost($data)
    {
        $student = Auth::user()->student;

        $bookPost = BookPost::create([
            'user_id' => Auth::id(),
            'university_id' => $student->university_id,
            'college_id' => $student->college_id,
            'title' => $data['title'],
            'description' => $data['description'],
            'is_free' => $data['is_free'],
            'price' => $data['price'],
            'status' => 'available', // Default status
        ]);

        // Clear the cache after creating a new book post
        Cache::forget('book_posts_' . $student->university_id . '_' . $student->college_id);

        return $bookPost;
    }

    public function getBookPostById($id)
    {
        return BookPost::with('user')->find($id);
    }

    public function getBookPostsByUserId($user_id)
    {
        return BookPost::where('user_id', $user_id)
            ->with(['user', 'requests'])
            ->withCount('requests')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function updateBookPost($id, $data)
    {
        // Logic to update a book post
    }

    public function deleteBookPost($id)
    {
        // Logic to delete a book post
    }
}
