<?php

use App\Http\Controllers\SuperAdmin\UniversityController;
use Illuminate\Support\Facades\Route;

Route::get('university',[UniversityController::class,'create'])
    ->name('super_admin.university.add');

Route::post('university',[UniversityController::class,'store'])
    ->middleware(['auth'])    
    ->name('super_admin.university.store');

Route::get('universities',[UniversityController::class,'index'])
    ->name('super_admin.university.index');

Route::get('university/{university}/edit',[UniversityController::class,'edit'])
    ->name('super_admin.university.edit');

Route::put('university/{university}',[UniversityController::class,'update'])
    ->name('super_admin.university.update');
    
Route::delete('university/{university}',[UniversityController::class,'destroy'])
    ->name('super_admin.university.destroy');