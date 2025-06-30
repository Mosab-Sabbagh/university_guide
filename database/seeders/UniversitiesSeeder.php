<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
            $universities = [
                [
                    'name_ar' => 'الجامعة الإسلامية',
                    'name_en' => 'Islamic University',
                    'abbreviation' => 'IUG',
                    'city' => 'غزة',
                    'address' => 'شارع أحمد ياسين، غزة',
                    'website' => 'www.iugaza.edu.ps',
                    'email' => 'info@iugaza.edu.ps',
                    'phone' => '+970 8 2644400',
                    'description' => 'أول جامعة فلسطينية تأسست في قطاع غزة عام 1978',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name_ar' => 'جامعة الأزهر',
                    'name_en' => 'Al-Azhar University',
                    'abbreviation' => 'AUG',
                    'city' => 'غزة',
                    'address' => 'شارع أحمد الشقيري، غزة',
                    'website' => 'www.alazhar.edu.ps',
                    'email' => 'info@alazhar.edu.ps',
                    'phone' => '+970 8 2822000',
                    'description' => 'جامعة حكومية تأسست عام 1991',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name_ar' => 'جامعة بيرزيت',
                    'name_en' => 'Birzeit University',
                    'abbreviation' => 'BZU',
                    'city' => 'بيرزيت',
                    'address' => 'بيرزيت، رام الله',
                    'website' => 'www.birzeit.edu',
                    'email' => 'info@birzeit.edu',
                    'phone' => '+970 2 2982000',
                    'description' => 'أقدم جامعة فلسطينية تأسست عام 1924',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name_ar' => 'جامعة النجاح الوطنية',
                    'name_en' => 'An-Najah National University',
                    'abbreviation' => 'NNU',
                    'city' => 'نابلس',
                    'address' => 'شارع رفيديا، نابلس',
                    'website' => 'www.najah.edu',
                    'email' => 'info@najah.edu',
                    'phone' => '+970 9 2345113',
                    'description' => 'أكبر الجامعات الفلسطينية تأسست عام 1977',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name_ar' => 'جامعة القدس',
                    'name_en' => 'Al-Quds University',
                    'abbreviation' => 'AQU',
                    'city' => 'القدس',
                    'address' => 'أبو ديس، القدس',
                    'website' => 'www.alquds.edu',
                    'email' => 'info@alquds.edu',
                    'phone' => '+970 2 2790400',
                    'description' => 'جامعة فلسطينية تأسست عام 1984',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name_ar' => 'جامعة بوليتكنك فلسطين',
                    'name_en' => 'Palestine Polytechnic University',
                    'abbreviation' => 'PPU',
                    'city' => 'الخليل',
                    'address' => 'شارع القدس، الخليل',
                    'website' => 'www.ppu.edu',
                    'email' => 'info@ppu.edu',
                    'phone' => '+970 2 2235500',
                    'description' => 'جامعة متخصصة في الهندسة والتكنولوجيا تأسست عام 1978',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name_ar' => 'جامعة بيت لحم',
                    'name_en' => 'Bethlehem University',
                    'abbreviation' => 'BU',
                    'city' => 'بيت لحم',
                    'address' => 'شارع الفرير، بيت لحم',
                    'website' => 'www.bethlehem.edu',
                    'email' => 'info@bethlehem.edu',
                    'phone' => '+970 2 2741241',
                    'description' => 'جامعة كاثوليكية تأسست عام 1973',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ];

            DB::table('universities')->insert($universities);
    }
}
