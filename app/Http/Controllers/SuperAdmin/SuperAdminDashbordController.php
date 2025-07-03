<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminDashbordController extends Controller
{
    public function index()
    {
        $usersCount = \App\Models\User::count();
        $universitiesCount = \App\Models\University::count();
        $collegesCount = \App\Models\College::count();
        $majorsCount = \App\Models\Major::count();

        return view('superAdmin.dashboard', [
            'usersCount' => $usersCount,
            'universitiesCount' => $universitiesCount,
            'collegesCount' => $collegesCount,
            'majorsCount' => $majorsCount,
        ]);
    }
}
