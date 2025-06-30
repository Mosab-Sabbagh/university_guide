<?php

use App\Http\Controllers\SuperAdmin\CollegeController;
use App\Http\Controllers\SuperAdmin\MajorController;
use App\Http\Controllers\SuperAdmin\UniversityController;
use Illuminate\Support\Facades\Route;

Route::get('university',[UniversityController::class,'create'])
    ->middleware(['super_admin','auth'])    
    ->name('super_admin.university.add');

Route::post('university',[UniversityController::class,'store'])
    ->middleware(['super_admin','auth'])    
    ->name('super_admin.university.store');

Route::get('universities',[UniversityController::class,'index'])
    ->middleware(['super_admin','auth'])    
    ->name('super_admin.university.index');

Route::get('university/{university}/edit',[UniversityController::class,'edit'])
    ->middleware(['super_admin','auth'])    
    ->name('super_admin.university.edit');

Route::put('university/{university}',[UniversityController::class,'update'])
    ->middleware(['super_admin','auth'])    
    ->name('super_admin.university.update');
    
Route::delete('university/{university}',[UniversityController::class,'destroy'])
    ->middleware(['super_admin','auth'])    
    ->name('super_admin.university.destroy');

Route::get('college',[CollegeController::class,'create'])
    ->middleware(['super_admin','auth'])    
    ->name('super_admin.college.add');

Route::post('college',[CollegeController::class,'store'])
    ->middleware(['super_admin','auth'])
    ->name('super_admin.college.store');
    
Route::get('colleges',[CollegeController::class,'index'])
    ->middleware(['super_admin','auth'])
    ->name('super_admin.college.index');

Route::get('college/{college}/edit',[CollegeController::class,'edit'])
    ->middleware(['super_admin','auth'])    
    ->name('super_admin.college.edit');

Route::put('college/{college}',[CollegeController::class,'update'])
    ->middleware(['super_admin','auth'])
    ->name('super_admin.college.update');
    
Route::delete('college/{college}',[CollegeController::class,'destroy'])
    ->middleware(['super_admin','auth'])
    ->name('super_admin.college.destroy');

    Route::get('major', [MajorController::class, 'create'])
        ->middleware(['super_admin', 'auth'])
        ->name('super_admin.major.add');

    Route::post('major', [MajorController::class, 'store'])
        ->middleware(['super_admin', 'auth'])
        ->name('super_admin.major.store');

    Route::get('majors', [MajorController::class, 'index'])
        ->middleware(['super_admin', 'auth'])
        ->name('super_admin.major.index');

    Route::get('major/{major}/edit', [MajorController::class, 'edit'])
        ->middleware(['super_admin', 'auth'])
        ->name('super_admin.major.edit');

    Route::put('major/{major}', [MajorController::class, 'update'])
        ->middleware(['super_admin', 'auth'])
        ->name('super_admin.major.update');

    Route::delete('major/{major}', [MajorController::class, 'destroy'])
        ->middleware(['super_admin', 'auth'])
        ->name('super_admin.major.destroy');


