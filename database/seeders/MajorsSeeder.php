<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // الحصول على الكليات مع اختصاراتها
        $colleges = DB::table('colleges')->pluck('id', 'abbreviation');

        $majors = [
            // تخصصات كلية الشريعة والقانون
            [
                'college_id' => $colleges['FOSL'],
                'name_ar' => 'الشريعة الإسلامية',
                'name_en' => 'Islamic Sharia',
                'code' => 'SHARIA',
                'description' => 'تخصص يهتم بدراسة العلوم الشرعية والفقه الإسلامي',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'college_id' => $colleges['FOSL'],
                'name_ar' => 'القانون',
                'name_en' => 'Law',
                'code' => 'LAW',
                'description' => 'تخصص يغطي الجوانب النظرية والعملية للنظام القانوني',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // تخصصات كلية الهندسة
            [
                'college_id' => $colleges['FOE'],
                'name_ar' => 'هندسة الحاسوب',
                'name_en' => 'Computer Engineering',
                'code' => 'CE',
                'description' => 'يجمع بين الهندسة الكهربائية وعلوم الحاسوب',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'college_id' => $colleges['FOE'],
                'name_ar' => 'الهندسة المدنية',
                'name_en' => 'Civil Engineering',
                'code' => 'CIVIL',
                'description' => 'تخصص يتناول تصميم وتنفيذ المشاريع الإنشائية',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // تخصصات كلية الطب
            [
                'college_id' => $colleges['FOM'],
                'name_ar' => 'الطب البشري',
                'name_en' => 'Human Medicine',
                'code' => 'MED',
                'description' => 'تخصص يؤهل الطلاب لممارسة مهنة الطب',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'college_id' => $colleges['FOM'],
                'name_ar' => 'الجراحة العامة',
                'name_en' => 'General Surgery',
                'code' => 'SURG',
                'description' => 'تخصص جراحي متقدم في مجال الطب',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // تخصصات كلية العلوم
            [
                'college_id' => $colleges['FOS'],
                'name_ar' => 'الفيزياء',
                'name_en' => 'Physics',
                'code' => 'PHY',
                'description' => 'دراسة المادة والطاقة وتفاعلاتها',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'college_id' => $colleges['FOS'],
                'name_ar' => 'الكيمياء',
                'name_en' => 'Chemistry',
                'code' => 'CHEM',
                'description' => 'دراسة المادة وخصائصها وتفاعلاتها',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // تخصصات كلية التجارة والاقتصاد
            [
                'college_id' => $colleges['FCE'],
                'name_ar' => 'المحاسبة',
                'name_en' => 'Accounting',
                'code' => 'ACC',
                'description' => 'تخصص يتناول القياس والإفصاح المالي',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'college_id' => $colleges['FCE'],
                'name_ar' => 'إدارة الأعمال',
                'name_en' => 'Business Administration',
                'code' => 'BUS',
                'description' => 'تخصص يهتم بإدارة المنظمات والمؤسسات',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // تخصصات كلية تكنولوجيا المعلومات
            [
                'college_id' => $colleges['FIT'],
                'name_ar' => 'علوم الحاسوب',
                'name_en' => 'Computer Science',
                'code' => 'CS',
                'description' => 'تخصص يركز على الجوانب النظرية للحوسبة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'college_id' => $colleges['FIT'],
                'name_ar' => 'هندسة البرمجيات',
                'name_en' => 'Software Engineering',
                'code' => 'SE',
                'description' => 'تخصص يهتم بتطوير الأنظمة البرمجية',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // تخصصات كلية الآداب
            [
                'college_id' => $colleges['FOA'],
                'name_ar' => 'اللغة العربية',
                'name_en' => 'Arabic Language',
                'code' => 'ARAB',
                'description' => 'تخصص في اللغة العربية وآدابها',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'college_id' => $colleges['FOA'],
                'name_ar' => 'التاريخ',
                'name_en' => 'History',
                'code' => 'HIST',
                'description' => 'دراسة الأحداث التاريخية وتحليلها',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('majors')->insert($majors);
    }
}
