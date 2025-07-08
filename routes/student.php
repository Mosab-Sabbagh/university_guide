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
    // Route::get('student/help_requests/create', [HelpRequestController::class, 'create'])
    //     ->name('student.help_requests.create');
    Route::post('student/help_requests/store', [HelpRequestController::class, 'store'])
        ->name('student.help_requests.store');
});

Route::middleware(['auth', 'student'])->group(function () {
    Route::post('student/comments/store/{helpRequest}', [HelpRequestCommentController::class, 'store'])
        ->name('student.comments.store');
});
