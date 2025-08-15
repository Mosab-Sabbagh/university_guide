<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\Student\HelpRequestService;
use App\Services\Student\ProfileStudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileStudentController extends Controller
{
    protected $profileService;

    public function __construct(ProfileStudentService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function show(HelpRequestService $helpRequestService)
    {
        $student = Auth::user();
        $helpRequests = $helpRequestService->getHelpRequestByUserId(Auth::id());
        return view('student.profile.show', compact('student','helpRequests'));
    }

    public function edit()
    {
        $student = Auth::user();
        return view('student.profile.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $result = $this->profileService->updateProfile($request);

        if ($result['status'] === 'success') {
            return redirect()->route('student.profile.show')->with('success', $result['message']);
        } else {
            return redirect()->back()->withErrors(['error' => $result['message']]);
        }
    }
}
