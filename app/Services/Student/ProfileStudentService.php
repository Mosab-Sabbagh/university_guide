<?php 
namespace App\Services\Student;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
class ProfileStudentService
{

    public function getProfile()
    {
        return Auth::user();;
    }

}
