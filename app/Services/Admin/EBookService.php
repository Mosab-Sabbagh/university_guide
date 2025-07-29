<?php

namespace App\Services\Admin;

use App\Models\Book;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class EBookService
{

    public function getBooks($search = null)
    {
        $cacheKey = $search
            ? "books_search_" . md5($search)  // تجنّب مشاكل الأحرف الخاصة في الكاش
            : "books_all";

        return Cache::remember($cacheKey, now()->addHour(), function () use ($search) {
            return Book::with('course')
                ->when($search, function ($query, $search) {
                    $query->where('title', 'like', "%{$search}%");
                })
                ->paginate(20);
        });
    }


    public function storeBook($data)
    {
        $filePath = $data['file_path']->store('books', 'public');

        Book::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'file_path' => $filePath,
            'course_id' => $data['course_id'],
        ]);

        Cache::forget('books_all');
    }


    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        if ($book->file_path) {
            Storage::disk('public')->delete($book->file_path);
        }
        $book->delete();
        Cache::forget('books_all');

    }
}
