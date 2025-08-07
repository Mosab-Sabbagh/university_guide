<?php

namespace Database\Seeders;

use App\Models\University;
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
                'name_ar' => 'الجامعة الإسلامية بغزة',
                'name_en' => 'Islamic University of Gaza',
                'abbreviation' => 'IUG',
                'city' => 'غزة',
                'address' => 'شارع عمر المختار، غزة',
                'website' => 'https://www.iugaza.edu.ps',
                'email' => 'info@iugaza.edu.ps',
                'phone' => '082640000',
                'description' => 'أول جامعة فلسطينية تأسست في قطاع غزة عام 1978، وتعتبر من أهم المؤسسات التعليمية في فلسطين'
            ],
            [
                'name_ar' => 'جامعة النجاح الوطنية',
                'name_en' => 'An-Najah National University',
                'abbreviation' => 'ANU',
                'city' => 'نابلس',
                'address' => 'ص.ب 7، نابلس، الضفة الغربية',
                'website' => 'https://www.najah.edu',
                'email' => 'info@najah.edu',
                'phone' => '092345511',
                'description' => 'أكبر الجامعات الفلسطينية وتقع في مدينة نابلس، تأسست عام 1977'
            ],
            [
                'name_ar' => 'جامعة بيرزيت',
                'name_en' => 'Birzeit University',
                'abbreviation' => 'BZU',
                'city' => 'بيرزيت',
                'address' => 'ص.ب 14، بيرزيت، رام الله',
                'website' => 'https://www.birzeit.edu',
                'email' => 'info@birzeit.edu',
                'phone' => '022982000',
                'description' => 'أقدم جامعة فلسطينية تأسست عام 1924، وتعتبر من أعرق المؤسسات التعليمية'
            ],
            [
                'name_ar' => 'جامعة القدس',
                'name_en' => 'Al-Quds University',
                'abbreviation' => 'AQU',
                'city' => 'أبو ديس',
                'address' => 'ص.ب 51000، القدس',
                'website' => 'https://www.alquds.edu',
                'email' => 'info@alquds.edu',
                'phone' => '022794000',
                'description' => 'الجامعة الوحيدة في القدس المحتلة، تأسست عام 1984'
            ],
            [
                'name_ar' => 'جامعة الخليل',
                'name_en' => 'Hebron University',
                'abbreviation' => 'HU',
                'city' => 'الخليل',
                'address' => 'ص.ب 40، الخليل',
                'website' => 'https://www.hebron.edu',
                'email' => 'info@hebron.edu',
                'phone' => '022222000',
                'description' => 'جامعة فلسطينية تقع في مدينة الخليل، تأسست عام 1971'
            ],
            [
                'name_ar' => 'جامعة بيت لحم',
                'name_en' => 'Bethlehem University',
                'abbreviation' => 'BU',
                'city' => 'بيت لحم',
                'address' => 'ص.ب 9، بيت لحم',
                'website' => 'https://www.bethlehem.edu',
                'email' => 'info@bethlehem.edu',
                'phone' => '022741241',
                'description' => 'جامعة فلسطينية تقع في مدينة بيت لحم، تأسست عام 1973'
            ],
            [
                'name_ar' => 'جامعة فلسطين التقنية - خضوري',
                'name_en' => 'Palestine Technical University - Kadoorie',
                'abbreviation' => 'PTUK',
                'city' => 'طولكرم',
                'address' => 'ص.ب 7، طولكرم',
                'website' => 'https://www.ptuk.edu.ps',
                'email' => 'info@ptuk.edu.ps',
                'phone' => '092267000',
                'description' => 'جامعة تقنية فلسطينية تقع في مدينة طولكرم، تأسست عام 1930'
            ],
            [
                'name_ar' => 'جامعة الأزهر - غزة',
                'name_en' => 'Al-Azhar University - Gaza',
                'abbreviation' => 'AUG',
                'city' => 'غزة',
                'address' => 'ص.ب 1277، غزة',
                'website' => 'https://www.alazhar.edu.ps',
                'email' => 'info@alazhar.edu.ps',
                'phone' => '082640000',
                'description' => 'جامعة فلسطينية تقع في قطاع غزة، تأسست عام 1991'
            ]
        ];

        University::insert($universities);
    }
}
