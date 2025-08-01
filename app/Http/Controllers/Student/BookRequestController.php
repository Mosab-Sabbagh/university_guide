<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\Student\BookRequestService;
use Illuminate\Http\Request;

class BookRequestController extends Controller
{
    public $bookRequestService;
    public function __construct(BookRequestService $bookRequestService)
    {
        $this->bookRequestService = $bookRequestService;
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'book_post_id' => 'required'
        ]);
        try {
            $this->bookRequestService->storeBookRequest($validatedData);
            return redirect()->back()->with('success', 'تم إرسال طلب الكتاب بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء إرسال طلب الكتاب.']);
        }
    }

    public function showReqestsForPost($post_id)
    {
        $bookRequests = $this->bookRequestService->getBookRequestByPostId($post_id);
        $bookName = $bookRequests->first()->bookPost->title ?? '---';
        if (!$bookRequests) {
            return redirect()->back()->withErrors(['error' => 'طلب الكتاب غير موجود.']);
        }
        return view('student.book_requests.show', compact('bookRequests','bookName'));
    }

    public function acceptRequest(Request $request)
    {
        $this->bookRequestService->acceptRequest($request->all());
        return redirect()->back()->with('success', 'تم قبول الطلب بنجاح.');
    }

    public function myRequests($user_id)
    {
        $bookRequests = $this->bookRequestService->getMyRequests($user_id);
        return view('student.book_requests.my_requests', compact('bookRequests'));
    }
}
