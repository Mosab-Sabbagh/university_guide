<?php 
namespace App\Services\Student;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
class StudentService{
    public function store($request, $user_id)
    {
        DB::beginTransaction();
        try {
            $profileImagePath = null;
            if ($request->hasFile('profile_image')) {
                $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            }

            $student = Student::create([
                'user_id' => $user_id,
                'university_id' => $request->university_id,
                'college_id' => $request->college_id,
                'major_id' => $request->major_id,
                'student_number' => $request->student_number,
                'enrollment_date' => $request->enrollment_date,
                'level' => $request->level,
                'profile_image' => $profileImagePath,
            ]);

            DB::commit();
            return $student;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}