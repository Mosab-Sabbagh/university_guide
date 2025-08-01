<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Services\Admin\CourseService;
use App\Services\Admin\EBookService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EBookController extends Controller
{
    public $eBookService;
    public function __construct(EBookService $eBookService)
    {
        $this->eBookService = $eBookService;
    }

    public function index(CourseService $courseService)
    {
        try {
            $search = request('search');
            $courses = $courseService->getCourses();
            $books = $this->eBookService->getBooks($search);
            return view('student.admin.books.index', compact('courses', 'books'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('admin.books.index')->with('error', 'حدث خطأ أثناء تحميل الكتب');
        }
    }

    public function store(BookRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $this->eBookService->storeBook($validatedData);
            return redirect()
                ->route('admin.books.index')
                ->with('success', 'تم إضافة المساق بنجاح');
        } catch (Exception $e) {
            Log::error('Error storing book: ' . $e->getMessage(), [
                'data' => $validatedData,
            ]);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة المساق: ');
        }
    }

    public function destroy($id)
    {
        try {
            $this->eBookService->deleteBook($id);
            return redirect()
                ->route('admin.books.index')
                ->with('success', 'تم حذف الكتاب بنجاح');
        } catch (Exception $e) {
            Log::error('Error deleting book: ' . $e->getMessage(), [
                'book_id' => $id,
            ]);
            return redirect()
                ->back()
                ->with('error', 'حدث خطأ أثناء حذف الكتاب');
        }
    }
}
