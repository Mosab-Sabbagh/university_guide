<?php

use App\Http\Controllers\Student\BookController;
use App\Http\Controllers\Student\BookPostController;
use App\Http\Controllers\Student\BookRequestController;
use App\Http\Controllers\Student\CourseGuideController;
use App\Http\Controllers\Student\HelpRequestCommentController;
use App\Http\Controllers\Student\HelpRequestController;
use App\Http\Controllers\Student\ProfileStudentController;
use App\Http\Controllers\Student\SummaryController;
use App\Models\HelpRequest;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'student'])->group(function () {
    Route::get('student/profile', [ProfileStudentController::class, 'show'])
        ->name('student.profile.show');

    Route::get('student/profile/edit', [ProfileStudentController::class, 'edit'])
        ->name('student.profile.edit');

    Route::put('student/profile/update', [ProfileStudentController::class, 'update'])
        ->name('student.profile.update');
});

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('student/help_requests', [HelpRequestController::class, 'index'])
        ->name('student.help_requests.index');

    Route::post('student/help_requests/store', [HelpRequestController::class, 'store'])
        ->name('student.help_requests.store');

        // تحديث الطلب (PUT)
Route::put('student/help-requests/{id}', [HelpRequestController::class, 'update'])->name('student.help_requests.update');

// حذف الطلب (DELETE)
Route::delete('student/help-requests/{id}', [HelpRequestController::class, 'destroy'])->name('student.help_requests.destroy');

});

Route::middleware(['auth', 'student'])->group(function () {
    Route::post('student/help-requests/{helpRequest}/comments', [HelpRequestCommentController::class, 'store'])
        ->name('student.comments.store');

    Route::patch('student/help-requests/{helpRequest}/comments/{comment}', [HelpRequestCommentController::class, 'update'])->name('student.comments.update');
    Route::delete('student/help-requests/{helpRequest}/comments/{comment}', [HelpRequestCommentController::class, 'destroy'])->name('student.comments.destroy');

});


Route::prefix('student/summary')->middleware(['auth', 'student'])->group(function () {
    Route::get('summaries',[SummaryController::class,'index'])->name('student.summaries.index');
    Route::post('summary',[SummaryController::class,'store'])->name('student.summary.store');
    Route::get('/{id}/download', [SummaryController::class, 'download'])->name('summaries.download');

});

Route::prefix('student/course_guide')->middleware(['auth', 'student'])->group(function () {
    Route::get('coursees_guide',[CourseGuideController::class,'index'])->name('student.course_guide.index');
});

Route::prefix('student/ebooks')->middleware(['auth', 'student'])->group(function () {
    Route::get('',[BookController::class,'index'])->name('student.books.index');
    Route::get('/{id}/download', [BookController::class, 'download'])->name('book.download');
});

Route::prefix('student/books-posts')->middleware(['auth', 'student'])->group(function () {
    Route::get('',[BookPostController::class,'index'])->name('student.bookPosts.index');
    Route::post('/store',[BookPostController::class,'store'])->name('student.book_post.store');
    Route::get('/show/{id}',[BookPostController::class,'show'])->name('student.book_post.show');
    Route::get('/posts/{user_id}', [BookPostController::class, 'getBookPostById'])->name('student.bookPosts.postsByUserId');
});

Route::prefix('student/book-request')->middleware(['auth', 'student'])->group(function () {
    Route::post('store',[BookRequestController::class,'store'])->name('student.bookRequests.store');
    Route::get('showRequests/{post_id}',[BookRequestController::class,'showReqestsForPost'])->name('student.bookRequests.showReqestsForPost');
    Route::post('accept/', [BookRequestController::class, 'acceptRequest'])->name('student.bookRequests.accept');
    Route::get('myRequests/{user_id}', [BookRequestController::class, 'myRequests'])->name('student.bookRequests.myRequests');
});

Route::prefix('student/teachers')->middleware(['auth', 'student'])->group(function () {
    Route::get('', [\App\Http\Controllers\Student\TeacherController::class, 'index'])->name('student.teachers.index');
    Route::get('/{id}', [\App\Http\Controllers\Student\TeacherController::class, 'show'])->name('student.teachers.show');
});
