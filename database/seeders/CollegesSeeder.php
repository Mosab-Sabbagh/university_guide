<?php

namespace Database\Seeders;

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
            ['name_ar' => 'كلية الهندسة', 'name_en' => 'Faculty of Engineering', 'abbreviation' => 'ENG', 'description' => 'كلية تهتم بالبرامج الهندسية.'],
            ['name_ar' => 'كلية الطب', 'name_en' => 'Faculty of Medicine', 'abbreviation' => 'MED', 'description' => 'كلية الطب البشري.'],
            ['name_ar' => 'كلية تكنولوجيا المعلومات', 'name_en' => 'Faculty of IT', 'abbreviation' => 'IT', 'description' => 'برامج الحوسبة والبرمجة.'],
            ['name_ar' => 'كلية العلوم', 'name_en' => 'Faculty of Science', 'abbreviation' => 'SCI', 'description' => 'تهتم بالعلوم الأساسية.'],
            ['name_ar' => 'كلية التربية', 'name_en' => 'Faculty of Education', 'abbreviation' => 'EDU', 'description' => 'إعداد معلمين ومعلمات.'],
            ['name_ar' => 'كلية الاقتصاد والعلوم الإدارية', 'name_en' => 'Faculty of Economics & Admin', 'abbreviation' => 'ECO', 'description' => 'علوم الاقتصاد والإدارة.'],
            ['name_ar' => 'كلية الحقوق', 'name_en' => 'Faculty of Law', 'abbreviation' => 'LAW', 'description' => 'دراسات قانونية.'],
            ['name_ar' => 'كلية الإعلام', 'name_en' => 'Faculty of Media', 'abbreviation' => 'MEDIA', 'description' => 'الإعلام والصحافة.'],
            ['name_ar' => 'كلية الفنون الجميلة', 'name_en' => 'Faculty of Fine Arts', 'abbreviation' => 'ART', 'description' => 'الرسوم، الموسيقى، المسرح.'],
            ['name_ar' => 'كلية الشريعة', 'name_en' => 'Faculty of Sharia', 'abbreviation' => 'SHR', 'description' => 'الدراسات الإسلامية والشرعية.'],
        ];

        foreach ($colleges as $college) {
            \App\Models\College::create($college);
        }
    }
}
