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
}
