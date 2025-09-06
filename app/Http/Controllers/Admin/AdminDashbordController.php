<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Course;
use App\Models\Student;
use App\Models\Summary;
use App\Services\Admin\AdminDashbordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminDashbordController extends Controller
{

public function index(AdminDashbordService $dashboardService)
{
    $data = $dashboardService->getDashboardData();
    
    return view('student.admin.index', [
        'studentCount' => $data['students'],
        'courseCount' => $data['courses'],
        'summaryCount' => $data['summaries']
    ]);
}

public function exportSummaryToJsonToD()
{
    // 1. جلب البيانات من قاعدة البيانات
    $summary = Summary::select('title', 'description')->get();

    // 2. تحويلها إلى JSON
    $jsonData = json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // 3. تحديد مسار الحفظ على قرص D
    $filePath = 'D:/summary.json'; // غير الاسم حسب رغبتك

    // 4. حفظ الملف
    File::put($filePath, $jsonData);

    return "تم إنشاء الملف في: " . $filePath;
}
}
