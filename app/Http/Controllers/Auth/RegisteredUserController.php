<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Role\UserRole;
use App\Services\Student\StudentService;
use App\Services\SuperAdmin\CollegeService;
use App\Services\SuperAdmin\MajorService;
use App\Services\SuperAdmin\UniversityService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(UniversityService $universityService , CollegeService $collegeService , MajorService $majorService): View
    {
        $universities = $universityService->getAllUniversities();
        $colleges = $collegeService->getAllColleges();
        $majors = $majorService->getAllMajors();
        return view('auth.register' , [
            'universities' => $universities,
            'colleges' => $colleges,
            'majors' => $majors,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request , StudentService $studentService): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => UserRole::STUDENT, // Added user_type field
        ]);

        // Create a new student record
        $studentService->store($request, $user->id);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
