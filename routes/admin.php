<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SummaryAdminController;
use App\Http\Controllers\Admin\AdminDashbordController;
use App\Http\Controllers\Admin\EBookController;
use App\Http\Controllers\Admin\TeacherController;

Route::get('/admin', [AdminDashbordController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.dashboard');

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

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/books', [EBookController::class, 'index'])->name('admin.books.index');
    Route::post('/book', [EBookController::class, 'store'])->name('admin.book.store');
    Route::delete('/book/{id}', [EBookController::class, 'destroy'])->name('admin.book.delete');
});


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/teachers', [TeacherController::class, 'index'])->name('admin.teachers.index');
    Route::post('/teacher', [TeacherController::class, 'store'])->name('admin.teacher.store');
    Route::get('/teacher/edit/{teacher_id}', [TeacherController::class, 'edit'])->name('admin.teacher.edit');
    Route::put('/teacher/update/{teacher_id}', [TeacherController::class, 'update'])->name('admin.teacher.update');
    Route::delete('/teacher/delete/{teacher_id}', [TeacherController::class, 'destroy'])->name('admin.teacher.delete');
});
Route::get('/export-summaries', [AdminDashbordController::class, 'exportSummaryToJsonToD'])->name('admin.export.summaries');