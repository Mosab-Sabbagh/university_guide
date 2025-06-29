<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add()
    {
        return view('superAdmin.admin.create');
    }
    public function create(Request $request)
    {
        dd($request->all());
    }
}
