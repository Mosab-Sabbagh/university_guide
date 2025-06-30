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
        // الحصول على IDs الجامعات من جدول الجامعات
        $universities = DB::table('universities')->pluck('id', 'abbreviation');

        $colleges = [
            // كليات الجامعة الإسلامية
            [
                'university_id' => $universities['IUG'],
                'name_ar' => 'كلية الشريعة والقانون',
                'name_en' => 'Faculty of Sharia and Law',
                'abbreviation' => 'FOSL',
                'description' => 'تختص بدراسة العلوم الشرعية والقانونية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'university_id' => $universities['IUG'],
                'name_ar' => 'كلية الهندسة',
                'name_en' => 'Faculty of Engineering',
                'abbreviation' => 'FOE',
                'description' => 'تضم أقسام الهندسة المدنية والكهربائية والحاسوب',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // كليات جامعة الأزهر
            [
                'university_id' => $universities['AUG'],
                'name_ar' => 'كلية الطب',
                'name_en' => 'Faculty of Medicine',
                'abbreviation' => 'FOM',
                'description' => 'تهدف إلى تخريج أطباء مؤهلين علمياً ومهنياً',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'university_id' => $universities['AUG'],
                'name_ar' => 'كلية العلوم',
                'name_en' => 'Faculty of Science',
                'abbreviation' => 'FOS',
                'description' => 'تضم أقسام الفيزياء، الكيمياء، الأحياء والرياضيات',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // كليات جامعة بيرزيت
            [
                'university_id' => $universities['BZU'],
                'name_ar' => 'كلية التجارة والاقتصاد',
                'name_en' => 'Faculty of Commerce and Economics',
                'abbreviation' => 'FCE',
                'description' => 'تضم تخصصات المحاسبة، إدارة الأعمال والاقتصاد',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'university_id' => $universities['BZU'],
                'name_ar' => 'كلية تكنولوجيا المعلومات',
                'name_en' => 'Faculty of Information Technology',
                'abbreviation' => 'FIT',
                'description' => 'تضم أقسام علوم الحاسوب وهندسة البرمجيات',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // كليات جامعة النجاح
            [
                'university_id' => $universities['NNU'],
                'name_ar' => 'كلية الهندسة وتكنولوجيا المعلومات',
                'name_en' => 'Faculty of Engineering and IT',
                'abbreviation' => 'FEIT',
                'description' => 'تضم عدة تخصصات هندسية وتكنولوجية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'university_id' => $universities['NNU'],
                'name_ar' => 'كلية الطب البشري',
                'name_en' => 'Faculty of Medicine',
                'abbreviation' => 'FMED',
                'description' => 'تهدف إلى تخريج أطباء بمعايير عالمية',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // كليات جامعة القدس
            [
                'university_id' => $universities['AQU'],
                'name_ar' => 'كلية الصيدلة',
                'name_en' => 'Faculty of Pharmacy',
                'abbreviation' => 'FOP',
                'description' => 'تختص بعلوم الصيدلة وتكنولوجيا الدواء',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'university_id' => $universities['AQU'],
                'name_ar' => 'كلية طب الأسنان',
                'name_en' => 'Faculty of Dentistry',
                'abbreviation' => 'FOD',
                'description' => 'تهدف إلى تخريج أطباء أسنان مؤهلين',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // كليات بوليتكنك فلسطين
            [
                'university_id' => $universities['PPU'],
                'name_ar' => 'كلية الهندسة التطبيقية',
                'name_en' => 'Faculty of Applied Engineering',
                'abbreviation' => 'FAE',
                'description' => 'تضم تخصصات الهندسة الكهربائية والميكانيكية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'university_id' => $universities['PPU'],
                'name_ar' => 'كلية تكنولوجيا المعلومات والاتصالات',
                'name_en' => 'Faculty of IT and Communications',
                'abbreviation' => 'FITC',
                'description' => 'تختص بتكنولوجيا المعلومات والاتصالات',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // كليات جامعة بيت لحم
            [
                'university_id' => $universities['BU'],
                'name_ar' => 'كلية التربية',
                'name_en' => 'Faculty of Education',
                'abbreviation' => 'FOED',
                'description' => 'تهدف إلى إعداد معلمين مؤهلين تربوياً',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'university_id' => $universities['BU'],
                'name_ar' => 'كلية الآداب',
                'name_en' => 'Faculty of Arts',
                'abbreviation' => 'FOA',
                'description' => 'تضم تخصصات اللغة العربية والإنجليزية والتاريخ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('colleges')->insert($colleges);
    }
}
