<?php

namespace App\Services\Student;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Exception;

class ProfileStudentService
{
    public function updateProfile(Request $request): array
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();
            $student = $user->student;

            // تحديث بيانات المستخدم
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // التعامل مع صورة الملف الشخصي
            if ($request->hasFile('profile_image')) {
                if ($student->profile_image && Storage::disk('public')->exists($student->profile_image)) {
                    Storage::disk('public')->delete($student->profile_image);
                }

                $path = $request->file('profile_image')->store('profile_images', 'public');
                $student->profile_image = $path;
            }

            // تحديث بيانات الطالب
            Student::where('user_id', $user->id)->update([
                'profile_image' => $student->profile_image,
                'level' => $request->level,
            ]);

            DB::commit();

            return [
                'status' => 'success',
                'message' => 'تم تحديث الملف الشخصي بنجاح.',
            ];
        } catch (Exception $e) {
            DB::rollBack();

            return [
                'status' => 'error',
                'message' => 'حدث خطأ أثناء التحديث: ' . $e->getMessage(),
            ];
        }
    }
}
