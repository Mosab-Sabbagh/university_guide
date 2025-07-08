<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        $studentsData = [
            [
                'name' => 'أحمد يوسف',
                'email' => 'ahmed1@student.com',
                'student_number' => '20231001',
            ],
            [
                'name' => 'ليان محمد',
                'email' => 'layan2@student.com',
                'student_number' => '20231002',
            ],
            [
                'name' => 'سارة عمر',
                'email' => 'sara3@student.com',
                'student_number' => '20231003',
            ],
            [
                'name' => 'عمر خالد',
                'email' => 'omar4@student.com',
                'student_number' => '20231004',
            ],
            [
                'name' => 'مها علاء',
                'email' => 'maha5@student.com',
                'student_number' => '20231005',
            ],
            [
                'name' => 'يوسف علي',
                'email' => 'yousef6@student.com',
                'student_number' => '20231006',
            ],
        ];

        foreach ($studentsData as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('123456789'), 
                'user_type' => 'student',
            ]);

            Student::create([
                'user_id' => $user->id,
                'student_number' => $data['student_number'],
                'university_id' => 1, 
                'college_id' => 1, 
                'major_id' => 1, 
                'enrollment_date' => now(), 
                'level' => 'سنة ثالثة', 
            ]);
        }
    }
}
