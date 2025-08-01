<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\Student\BookPostService;
use App\Http\Requests\BookPostRequest;

class BookPostController extends Controller
{
    public $bookPostService;
    public function __construct(BookPostService $bookPostService)
    {
        $this->bookPostService = $bookPostService;
    }
    public function index()
    {
        try{
        $search = request('search');
        $bookPosts = $this->bookPostService->getAllBookPosts($search);
        return view('student.book_posts.index', compact('bookPosts'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل منشورات الكتب.']);
        }
    }

    public function store(BookPostRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $this->bookPostService->createBookPost($validatedData);
            return redirect()->route('student.bookPosts.index')->with('success', 'تم إنشاء منشور الكتاب بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء إنشاء منشور الكتاب.']);
        }
    }

    public function show($id)
    {
        $bookPost = $this->bookPostService->getBookPostById($id);
        if (!$bookPost) {
            return redirect()->route('student.bookPosts.index')->withErrors(['error' => 'منشور الكتاب غير موجود.']);
        }
        return view('student.book_posts.show', compact('bookPost'));
    }

    public function getBookPostById($user_id)
    {
        $bookPosts = $this->bookPostService->getBookPostsByUserId($user_id);
        return view('student.book_posts.myPosts', compact('bookPosts'));
    }
}
