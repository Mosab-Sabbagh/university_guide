<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $colleges = [
            // كليات الهندسة والتكنولوجيا
            [
                'name_ar' => 'كلية الهندسة',
                'name_en' => 'Faculty of Engineering',
                'abbreviation' => 'FE',
                'description' => 'تضم عدة تخصصات هندسية متطورة مثل الهندسة المدنية والميكانيكية والكهربائية'
            ],
            [
                'name_ar' => 'كلية تكنولوجيا المعلومات',
                'name_en' => 'Faculty of Information Technology',
                'abbreviation' => 'FIT',
                'description' => 'تأسست عام 1998 وتواكب التطورات التكنولوجية الحديثة'
            ],
            [
                'name_ar' => 'كلية الهندسة المعمارية',
                'name_en' => 'Faculty of Architecture',
                'abbreviation' => 'FA',
                'description' => 'تختص بتصميم المباني والتخطيط العمراني'
            ],

            // كليات الطب والعلوم الصحية
            [
                'name_ar' => 'كلية الطب البشري',
                'name_en' => 'Faculty of Medicine',
                'abbreviation' => 'FMED',
                'description' => 'أول كلية طب في الضفة الغربية، تخرج أطباء متميزين'
            ],
            [
                'name_ar' => 'كلية الصيدلة',
                'name_en' => 'Faculty of Pharmacy',
                'abbreviation' => 'FPH',
                'description' => 'تأسست عام 1995 وتخرج صيادلة متميزين'
            ],
            [
                'name_ar' => 'كلية طب الأسنان',
                'name_en' => 'Faculty of Dentistry',
                'abbreviation' => 'FDENT',
                'description' => 'تختص بطب الأسنان وجراحة الفم والوجه'
            ],
            [
                'name_ar' => 'كلية العلوم الصحية',
                'name_en' => 'Faculty of Health Sciences',
                'abbreviation' => 'FHS',
                'description' => 'تضم تخصصات التمريض والعلاج الطبيعي'
            ],

            // كليات العلوم الإنسانية والاجتماعية
            [
                'name_ar' => 'كلية الآداب والعلوم الإنسانية',
                'name_en' => 'Faculty of Arts and Humanities',
                'abbreviation' => 'FAH',
                'description' => 'تضم تخصصات اللغة العربية والإنجليزية والتاريخ'
            ],
            [
                'name_ar' => 'كلية العلوم الاجتماعية',
                'name_en' => 'Faculty of Social Sciences',
                'abbreviation' => 'FSS',
                'description' => 'تضم تخصصات علم النفس والاجتماع والخدمة الاجتماعية'
            ],
            [
                'name_ar' => 'كلية التربية',
                'name_en' => 'Faculty of Education',
                'abbreviation' => 'FEDU',
                'description' => 'تختص بإعداد المعلمين والتربويين'
            ],

            // كليات الشريعة والقانون
            [
                'name_ar' => 'كلية الشريعة والقانون',
                'name_en' => 'Faculty of Sharia and Law',
                'abbreviation' => 'FSL',
                'description' => 'تأسست عام 1978 وتعد من أقدم كليات الجامعة'
            ],
            [
                'name_ar' => 'كلية الحقوق',
                'name_en' => 'Faculty of Law',
                'abbreviation' => 'FL',
                'description' => 'تخرج محامين وقانونيين متميزين'
            ],

            // كليات التجارة والاقتصاد
            [
                'name_ar' => 'كلية التجارة والاقتصاد',
                'name_en' => 'Faculty of Business and Economics',
                'abbreviation' => 'FBE',
                'description' => 'من أعرق الكليات في الجامعة، تختص بإدارة الأعمال والاقتصاد'
            ],
            [
                'name_ar' => 'كلية العلوم الإدارية',
                'name_en' => 'Faculty of Administrative Sciences',
                'abbreviation' => 'FAS',
                'description' => 'تختص بإدارة الأعمال والمحاسبة والمالية'
            ],

            // كليات العلوم
            [
                'name_ar' => 'كلية العلوم',
                'name_en' => 'Faculty of Science',
                'abbreviation' => 'FS',
                'description' => 'تضم تخصصات الرياضيات والفيزياء والكيمياء والأحياء'
            ],
            [
                'name_ar' => 'كلية الزراعة',
                'name_en' => 'Faculty of Agriculture',
                'abbreviation' => 'FAG',
                'description' => 'تختص بالعلوم الزراعية والبيطرية'
            ],

            // كليات الإعلام والفنون
            [
                'name_ar' => 'كلية الإعلام',
                'name_en' => 'Faculty of Media',
                'abbreviation' => 'FM',
                'description' => 'تختص بالإعلام والصحافة والاتصال الجماهيري'
            ],
            [
                'name_ar' => 'كلية الفنون الجميلة',
                'name_en' => 'Faculty of Fine Arts',
                'abbreviation' => 'FFA',
                'description' => 'تختص بالفنون التشكيلية والتصميم الجرافيكي'
            ]
        ];

        College::insert($colleges);
    }
}
