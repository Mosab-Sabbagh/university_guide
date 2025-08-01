<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\Admin\EBookService;
use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index(EBookService $eBookService)
    {
        try {
            $search = request('search');
            $books = $eBookService->getBooks($search);
            return view('student.books.index', compact('books'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('student.books.index')->with('error', 'حدث خطأ أثناء تحميل الكتب');
        }
    }


    public function download($id)
    {
        try {
            $book = Book::findOrFail($id);
            $filePath = storage_path('app/public/' . $book->file_path);
            if (!file_exists($filePath)) {
                abort(404, 'الملف غير موجود');
            }
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);
            $filename = str_replace(['/', '\\', ':', '*', '?', '"', '<', '>', '|'], '-', $book->title) . '.' . $extension;
            $downloadInfo = [
                'path' => $filePath,
                'name' => $filename,
            ];
            // Return the file as a download response
            return response()->download($downloadInfo['path'], $downloadInfo['name']);
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('student.books.index')->with('error', 'حدث خطأ أثناءتحميل الكتاب');
        }
    }
}
