<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Services\SuperAdmin\UniversityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileStudentController extends Controller
{
    public function show()
    {
        $student = Auth::user(); 
        return view('student.profile.show',compact('student'));
    }

    public function edit()
    {
        $student = Auth::user(); 
        return view('student.profile.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $student = $user->student;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->hasFile('profile_image')) {
            // حذف الصورة القديمة إن وُجدت
            if ($student->profile_image && Storage::disk('public')->exists($student->profile_image)) {
                Storage::disk('public')->delete($student->profile_image);
            }

            $path = $request->file('profile_image')->store('profile_images', 'public');
            $student->profile_image = $path;
        }

        Student::where('user_id', $user->id)->update([
            'profile_image' => $student->profile_image,
            'level' => $request->level,

        ]);

        return redirect()->route('student.profile.show')->with('success', 'تم تحديث الملف الشخصي بنجاح.');
    }
}
