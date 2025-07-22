<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/super_admin.php';
require __DIR__.'/student.php';

Route::get('/student', function () {
    return view('student.teststudent');
});

// test routes for cache and session for redis
Route::get('/set-session', function () {
    session(['key' => 'redis session working']);
    return 'Session set!';
});

Route::get('/get-session', function () {
    return session('key', 'No session found');
});

Route::get('/test-cache', function () {
    $value = Cache::remember('check_redis', 120, function () {
        return 'Redis is working!';
    });

    return "Cache value: " . $value;
});