<?php

namespace Database\Seeders;

use App\Models\Major;
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
        $majors = [
            // تخصصات كلية الشريعة والقانون
            [
                'name_ar' => 'الشريعة الإسلامية',
                'name_en' => 'Islamic Sharia',
                'code' => 'SHARIA'
            ],
            [
                'name_ar' => 'القانون',
                'name_en' => 'Law',
                'code' => 'LAW'
            ],
            [
                'name_ar' => 'أصول الدين',
                'name_en' => 'Religious Fundamentals',
                'code' => 'RELIG'
            ],

            // تخصصات كلية الهندسة
            [
                'name_ar' => 'هندسة الحاسوب',
                'name_en' => 'Computer Engineering',
                'code' => 'CE'
            ],
            [
                'name_ar' => 'هندسة الكهرباء',
                'name_en' => 'Electrical Engineering',
                'code' => 'EE'
            ],
            [
                'name_ar' => 'هندسة الميكانيكا',
                'name_en' => 'Mechanical Engineering',
                'code' => 'ME'
            ],
            [
                'name_ar' => 'هندسة المدني',
                'name_en' => 'Civil Engineering',
                'code' => 'CIVIL'
            ],
            [
                'name_ar' => 'هندسة الصناعية',
                'name_en' => 'Industrial Engineering',
                'code' => 'IE'
            ],
            [
                'name_ar' => 'هندسة الكيمياء',
                'name_en' => 'Chemical Engineering',
                'code' => 'CHE'
            ],

            // تخصصات كلية تكنولوجيا المعلومات
            [
                'name_ar' => 'علوم الحاسوب',
                'name_en' => 'Computer Science',
                'code' => 'CS'
            ],
            [
                'name_ar' => 'هندسة البرمجيات',
                'name_en' => 'Software Engineering',
                'code' => 'SE'
            ],
            [
                'name_ar' => 'نظم المعلومات',
                'name_en' => 'Information Systems',
                'code' => 'IS'
            ],
            [
                'name_ar' => 'أمن المعلومات',
                'name_en' => 'Information Security',
                'code' => 'INFOSEC'
            ],
            [
                'name_ar' => 'الذكاء الاصطناعي',
                'name_en' => 'Artificial Intelligence',
                'code' => 'AI'
            ],

            // تخصصات كلية الطب
            [
                'name_ar' => 'الطب البشري',
                'name_en' => 'Human Medicine',
                'code' => 'MED'
            ],

            // تخصصات كلية الصيدلة
            [
                'name_ar' => 'دكتور صيدلة',
                'name_en' => 'Pharm.D',
                'code' => 'PHARM'
            ],

            // تخصصات كلية طب الأسنان
            [
                'name_ar' => 'طب الأسنان',
                'name_en' => 'Dentistry',
                'code' => 'DENT'
            ],

            // تخصصات كلية العلوم الصحية
            [
                'name_ar' => 'التمريض',
                'name_en' => 'Nursing',
                'code' => 'NURS'
            ],
            [
                'name_ar' => 'العلاج الطبيعي',
                'name_en' => 'Physical Therapy',
                'code' => 'PT'
            ],
            [
                'name_ar' => 'التغذية العلاجية',
                'name_en' => 'Clinical Nutrition',
                'code' => 'CN'
            ],
            // تخصصات كلية التجارة والاقتصاد
            [
                'name_ar' => 'إدارة الأعمال',
                'name_en' => 'Business Administration',
                'code' => 'BA'
            ],
            [
                'name_ar' => 'المحاسبة',
                'name_en' => 'Accounting',
                'code' => 'ACC'
            ],
            [
                'name_ar' => 'الاقتصاد',
                'name_en' => 'Economics',
                'code' => 'ECON'
            ],
            [
                'name_ar' => 'التمويل',
                'name_en' => 'Finance',
                'code' => 'FIN'
            ],
            [
                'name_ar' => 'التسويق',
                'name_en' => 'Marketing',
                'code' => 'MKT'
            ],
            [
                'name_ar' => 'إدارة الموارد البشرية',
                'name_en' => 'Human Resource Management',
                'code' => 'HRM'
            ],

            // تخصصات كلية الآداب
            [
                'name_ar' => 'اللغة العربية',
                'name_en' => 'Arabic Language',
                'code' => 'ARAB'
            ],
            [
                'name_ar' => 'اللغة الإنجليزية',
                'name_en' => 'English Language',
                'code' => 'ENG'
            ],
            [
                'name_ar' => 'التاريخ',
                'name_en' => 'History',
                'code' => 'HIST'
            ],
            [
                'name_ar' => 'الجغرافيا',
                'name_en' => 'Geography',
                'code' => 'GEO'
            ],
            [
                'name_ar' => 'الترجمة',
                'name_en' => 'Translation',
                'code' => 'TRANS'
            ],

            // تخصصات كلية العلوم الاجتماعية
            [
                'name_ar' => 'علم النفس',
                'name_en' => 'Psychology',
                'code' => 'PSYCH'
            ],
            [
                'name_ar' => 'علم الاجتماع',
                'name_en' => 'Sociology',
                'code' => 'SOC'
            ],
            [
                'name_ar' => 'الخدمة الاجتماعية',
                'name_en' => 'Social Work',
                'code' => 'SW'
            ],
            [
                'name_ar' => 'العلوم السياسية',
                'name_en' => 'Political Science',
                'code' => 'POL'
            ],

            // تخصصات كلية التربية
            [
                'name_ar' => 'التربية الخاصة',
                'name_en' => 'Special Education',
                'code' => 'SPED'
            ],
            [
                'name_ar' => 'المناهج وطرق التدريس',
                'name_en' => 'Curriculum and Teaching Methods',
                'code' => 'CTM'
            ],
            [
                'name_ar' => 'الإدارة التربوية',
                'name_en' => 'Educational Administration',
                'code' => 'EA'
            ],

            // تخصصات كلية العلوم
            [
                'name_ar' => 'الرياضيات',
                'name_en' => 'Mathematics',
                'code' => 'MATH'
            ],
            [
                'name_ar' => 'الفيزياء',
                'name_en' => 'Physics',
                'code' => 'PHYS'
            ],
            [
                'name_ar' => 'الكيمياء',
                'name_en' => 'Chemistry',
                'code' => 'CHEM'
            ],
            [
                'name_ar' => 'الأحياء',
                'name_en' => 'Biology',
                'code' => 'BIO'
            ],
            [
                'name_ar' => 'البيولوجيا الجزيئية',
                'name_en' => 'Molecular Biology',
                'code' => 'MBIO'
            ],

            // تخصصات كلية الزراعة
            [
                'name_ar' => 'العلوم الزراعية',
                'name_en' => 'Agricultural Sciences',
                'code' => 'AGRI'
            ],
            [
                'name_ar' => 'الطب البيطري',
                'name_en' => 'Veterinary Medicine',
                'code' => 'VET'
            ],

            // تخصصات كلية الإعلام
            [
                'name_ar' => 'الإعلام',
                'name_en' => 'Media',
                'code' => 'MEDIA'
            ],
            [
                'name_ar' => 'الصحافة',
                'name_en' => 'Journalism',
                'code' => 'JOUR'
            ],
            [
                'name_ar' => 'الإذاعة والتلفزيون',
                'name_en' => 'Radio and Television',
                'code' => 'RTV'
            ],

            // تخصصات كلية الفنون
            [
                'name_ar' => 'الفنون التشكيلية',
                'name_en' => 'Fine Arts',
                'code' => 'FA'
            ],
            [
                'name_ar' => 'التصميم الجرافيكي',
                'name_en' => 'Graphic Design',
                'code' => 'GD'
            ]
        ];

        Major::insert($majors);
    }
}