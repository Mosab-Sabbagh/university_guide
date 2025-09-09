<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\College;
use App\Models\Course;
use App\Models\Major;
use App\Models\Summary;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExportDataToAi extends Controller
{
    

public function Summary()
{
    // 1. جلب البيانات من قاعدة البيانات
    $summary = Summary::select('title', 'description')->get();

    // 2. تحويلها إلى JSON
    $jsonData = json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // 3. تنزيل الملف مباشرة عبر المتصفح
    return response()->streamDownload(function () use ($jsonData) {
        echo $jsonData;
    }, 'summary.json', [
        'Content-Type' => 'application/json',
    ]);
}
public function Book()
{
    // 1. جلب البيانات من قاعدة البيانات
    $book = Book::select('title', 'description')->get();

    // 2. تحويلها إلى JSON
    $jsonData = json_encode($book, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // 3. تنزيل الملف مباشرة عبر المتصفح
    return response()->streamDownload(function () use ($jsonData) {
        echo $jsonData;
    }, 'books.json', [
        'Content-Type' => 'application/json',
    ]);
}
public function University()
{
    // 1. جلب البيانات من قاعدة البيانات
    $university = University::select('name_ar', 'name_en','abbreviation')->get();

    // 2. تحويلها إلى JSON
    $jsonData = json_encode($university, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // 3. تنزيل الملف مباشرة عبر المتصفح
    return response()->streamDownload(function () use ($jsonData) {
        echo $jsonData;
    }, 'universities.json', [
        'Content-Type' => 'application/json',
    ]);
}
public function College()
{
    // 1. جلب البيانات من قاعدة البيانات
    $college = College::select('name_ar', 'name_en','abbreviation')->get();

    // 2. تحويلها إلى JSON
    $jsonData = json_encode($college, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // 3. تنزيل الملف مباشرة عبر المتصفح
    return response()->streamDownload(function () use ($jsonData) {
        echo $jsonData;
    }, 'colleges.json', [
        'Content-Type' => 'application/json',
    ]);
}
public function Major()
{
    // 1. جلب البيانات من قاعدة البيانات
    $major = Major::select('name_ar', 'name_en')->get();

    // 2. تحويلها إلى JSON
    $jsonData = json_encode($major, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // 3. تنزيل الملف مباشرة عبر المتصفح
    return response()->streamDownload(function () use ($jsonData) {
        echo $jsonData;
    }, 'majors.json', [
        'Content-Type' => 'application/json',
    ]);
}
public function Course()
{
    // 1. جلب البيانات من قاعدة البيانات
    $course = Course::select('name_ar', 'name_en')->get();

    // 2. تحويلها إلى JSON
    $jsonData = json_encode($course, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // 3. تنزيل الملف مباشرة عبر المتصفح
    return response()->streamDownload(function () use ($jsonData) {
        echo $jsonData;
    },  'courses.json', [
        'Content-Type' => 'application/json',
    ]);
}
}
