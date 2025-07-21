<?php

use App\Http\Controllers\Student\HelpRequestCommentController;
use App\Http\Controllers\Student\HelpRequestController;
use App\Http\Controllers\Student\ProfileStudentController;
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


// Route::prefix('student/help-requests/{helpRequest}/comments')->name('student.comments.')->middleware(['auth', 'student'])->group(function () {
//     Route::patch('{comment}', [HelpRequestCommentController::class, 'update'])->name('update');
//     Route::delete('{comment}', [HelpRequestCommentController::class, 'destroy'])->name('destroy');
// });

