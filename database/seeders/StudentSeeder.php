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
                'name' => 'أحمد يوسف أبو رمان',
                'email' => 'ahmed.aburman@student.ps',
                'student_number' => '20231001',
                'university_id' => 1, // الجامعة الإسلامية
                'college_id' => 1, // كلية الهندسة
                'major_id' => 4, // هندسة الحاسوب
                'level' => 3,
            ],
            [
                'name' => 'ليان محمد النجار',
                'email' => 'layan.najjar@student.ps',
                'student_number' => '20231002',
                'university_id' => 2, // جامعة النجاح
                'college_id' => 4, // كلية الطب
                'major_id' => 15, // الطب البشري
                'level' => 4,
            ],
            [
                'name' => 'سارة عمر الشريف',
                'email' => 'sara.sharif@student.ps',
                'student_number' => '20231003',
                'university_id' => 3, // جامعة بيرزيت
                'college_id' => 12, // كلية التجارة
                'major_id' => 30, // إدارة الأعمال
                'level' => 2,
            ],
            [
                'name' => 'عمر خالد الزعبي',
                'email' => 'omar.zaabi@student.ps',
                'student_number' => '20231004',
                'university_id' => 1, // الجامعة الإسلامية
                'college_id' => 2, // كلية تكنولوجيا المعلومات
                'major_id' => 11, // علوم الحاسوب
                'level' => 3,
            ],
            [
                'name' => 'مها علاء المصري',
                'email' => 'maha.masri@student.ps',
                'student_number' => '20231005',
                'university_id' => 2, // جامعة النجاح
                'college_id' => 5, // كلية الصيدلة
                'major_id' => 16, // دكتور صيدلة
                'level' => 5,
            ],
            [
                'name' => 'يوسف علي الحسيني',
                'email' => 'yousef.husseini@student.ps',
                'student_number' => '20231006',
                'university_id' => 3, // جامعة بيرزيت
                'college_id' => 11, // كلية الحقوق
                'major_id' => 2, // القانون
                'level' => 4,
            ],
            [
                'name' => 'نور محمود العلي',
                'email' => 'nour.ali@student.ps',
                'student_number' => '20231007',
                'university_id' => 4, // جامعة القدس
                'college_id' => 8, // كلية العلوم الاجتماعية
                'major_id' => 37, // علم النفس
                'level' => 2,
            ],
            [
                'name' => 'خالد عبد الرحمن أبو زيد',
                'email' => 'khalid.abuzaid@student.ps',
                'student_number' => '20231008',
                'university_id' => 1, // الجامعة الإسلامية
                'college_id' => 1, // كلية الهندسة
                'major_id' => 5, // هندسة الكهرباء
                'level' => 3,
            ],
            [
                'name' => 'ليلى أحمد الدجاني',
                'email' => 'laila.dajani@student.ps',
                'student_number' => '20231009',
                'university_id' => 2, // جامعة النجاح
                'college_id' => 6, // كلية طب الأسنان
                'major_id' => 17, // طب الأسنان
                'level' => 4,
            ],
            [
                'name' => 'ياسر محمد أبو عودة',
                'email' => 'yasser.abouda@student.ps',
                'student_number' => '20231010',
                'university_id' => 3, // جامعة بيرزيت
                'college_id' => 13, // كلية العلوم الإدارية
                'major_id' => 31, // المحاسبة
                'level' => 2,
            ],
            [
                'name' => 'رنا سامي النتشة',
                'email' => 'rana.natsheh@student.ps',
                'student_number' => '20231011',
                'university_id' => 4, // جامعة القدس
                'college_id' => 7, // كلية الآداب
                'major_id' => 32, // اللغة العربية
                'level' => 3,
            ],
            [
                'name' => 'أحمد علي أبو شقرة',
                'email' => 'ahmed.abushakra@student.ps',
                'student_number' => '20231012',
                'university_id' => 5, // جامعة الخليل
                'college_id' => 14, // كلية العلوم
                'major_id' => 42, // الرياضيات
                'level' => 2,
            ],
            [
                'name' => 'فاطمة خالد أبو عودة',
                'email' => 'fatima.abouda@student.ps',
                'student_number' => '20231013',
                'university_id' => 6, // جامعة بيت لحم
                'college_id' => 9, // كلية التربية
                'major_id' => 40, // التربية الخاصة
                'level' => 3,
            ],
            [
                'name' => 'محمد يوسف أبو رمان',
                'email' => 'mohammed.aburman@student.ps',
                'student_number' => '20231014',
                'university_id' => 7, // جامعة خضوري
                'college_id' => 15, // كلية الزراعة
                'major_id' => 47, // العلوم الزراعية
                'level' => 2,
            ],
            [
                'name' => 'سارة أحمد أبو عودة',
                'email' => 'sara.abouda@student.ps',
                'student_number' => '20231015',
                'university_id' => 8, // جامعة الأزهر
                'college_id' => 10, // كلية الشريعة
                'major_id' => 1, // الشريعة الإسلامية
                'level' => 4,
            ]
        ];

        foreach ($studentsData as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('123456789'),
                'user_type' => 'student',
                'is_admin' => 0,
            ]);

            Student::create([
                'user_id' => $user->id,
                'student_number' => $data['student_number'],
                'university_id' => $data['university_id'],
                'college_id' => $data['college_id'],
                'major_id' => $data['major_id'],
                'enrollment_date' => now()->subYears($data['level'] - 1),
                'level' => $data['level'],
            ]);


            Student::create([
                'user_id' => $user->id,
                'student_number' => $data['student_number'],
                'university_id' => $data['university_id'],
                'college_id' => $data['college_id'],
                'major_id' => $data['major_id'],
                'enrollment_date' => now()->subYears($data['level'] - 1),
                'level' => $data['level'],
            ]);

            $admin1 =User::where('email', 'admin1@universityguide.ps')->first();
            $admin2 =User::where('email', 'admin2@universityguide.ps')->first();

            Student::create([
                'user_id' => $admin1->id,
                'student_number' => '20231016',
                'university_id' => 1, // الجامعة الإسلامية
                'college_id' => 1, // كلية الهندسة
                'major_id' => 4, // هندسة الحاسوب
                'enrollment_date' => now()->subYears($data['level'] - 1),
                'level' => 3,
            ]);

            Student::create([
                'user_id' => $admin2->id,
                'student_number' => '20271006',
                'university_id' => 8, // جامعة الأزهر, 
                'college_id' => 10, // كلية الشريعة, 
                'major_id' => 1, // الشريعة الإسلامية, 
                'enrollment_date' => now()->subYears($data['level'] - 1),
                'level' => 4,
            ]);

        }
    }
}
