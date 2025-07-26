<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SummaryAdminController;

// بدها تغيير 
Route::get('/admin', function () {
    return view('student.admin.index');
})->name('admin');


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::post('/course' , [CourseController::class,'store'])->name('admin.courses.store');
    Route::get('/course/{id}' , [CourseController::class,'edit'])->name('admin.courses.edit');
    Route::put('/course/{id}' , [CourseController::class,'update'])->name('admin.course.update');
    Route::delete('/course/{id}' , [CourseController::class,'destroy'])->name('admin.course.delete');
    // Other admin routes can be added here
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/summaries', [SummaryAdminController::class, 'index'])->name('admin.summaries.index');
    Route::delete('/summary/{id}' , [SummaryAdminController::class,'destroy'])->name('admin.summary.delete');
});