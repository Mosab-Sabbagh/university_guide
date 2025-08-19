<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\HomeController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/university-logos/{filename}', function($filename) {
    $path = 'universities/logos/' . $filename;
    $fullPath = storage_path('app/public/' . $path);
    
    if (!File::exists($fullPath)) {
        abort(404);
    }

    return response()->file($fullPath);
})->name('university.logo');

Route::get('/', [HomeController::class,'index'])->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/super_admin.php';
require __DIR__.'/student.php';
require __DIR__.'/admin.php';

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