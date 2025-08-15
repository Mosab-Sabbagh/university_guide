<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\Student\BookRequestService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء إرسال طلب الكتاب.']);
        }
    }

    public function showReqestsForPost($post_id)
    {
        try {
            $bookRequests = $this->bookRequestService->getBookRequestByPostId($post_id);

            // إذا ما فيه طلبات أو الكتاب مش لصاحبه
            if ($bookRequests->isEmpty()) {
                return redirect()->back()->withErrors(['error' => 'لا يوجد طلبات لهذا الكتاب أو لا تملك صلاحية العرض.']);
            }

            $bookName = $bookRequests->first()->bookPost->title ?? '---';
            return view('student.book_requests.show', compact('bookRequests', 'bookName'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'طلب الكتاب غير موجود.']);
        }
    }




    public function acceptRequest(Request $request)
    {
        try {
            $this->bookRequestService->acceptRequest($request->all());
            return redirect()->back()->with('success', 'تم قبول الطلب بنجاح.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة ما');
        }
    }

    public function myRequests($user_id)
    {
        try {
            if (Auth::user()->id == $user_id) {
                $bookRequests = $this->bookRequestService->getMyRequests($user_id);
                return view('student.book_requests.my_requests', compact('bookRequests'));
            } else {
                return redirect()->back()->with('error', 'لا يمكنك الوصول');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'هناك خلل ما حاول مرة اخرى');
        }
    }
}
