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
                'name_ar' => 'جامعة بيرزيت',
                'name_en' => 'Birzeit University',
                'abbreviation' => 'BZU',
                'city' => 'رام الله',
                'address' => 'بيرزيت',
                'website' => 'https://www.birzeit.edu',
                'email' => 'info@birzeit.edu',
                'phone' => '022982000',
                'description' => 'إحدى أبرز الجامعات الفلسطينية.',
                
            ],
            [
                'name_ar' => 'جامعة النجاح الوطنية',
                'name_en' => 'An-Najah National University',
                'abbreviation' => 'ANU',
                'city' => 'نابلس',
                'address' => 'شارع الجامعة',
                'website' => 'https://www.najah.edu',
                'email' => 'info@najah.edu',
                'phone' => '092345678',
                'description' => 'أكبر جامعة في الضفة الغربية.',
                
            ],
            [
                'name_ar' => 'الجامعة الإسلامية - غزة',
                'name_en' => 'Islamic University of Gaza',
                'abbreviation' => 'IUG',
                'city' => 'غزة',
                'address' => 'شارع الجامعة',
                'website' => 'https://www.iugaza.edu.ps',
                'email' => 'info@iugaza.edu.ps',
                'phone' => '082640000',
                'description' => 'جامعة متميزة في التعليم والبحث.',
                
            ],
            [
                'name_ar' => 'جامعة الأزهر - غزة',
                'name_en' => 'Al-Azhar University - Gaza',
                'abbreviation' => 'AUG',
                'city' => 'غزة',
                'address' => 'شارع الوحدة',
                'website' => 'https://www.alazhar.edu.ps',
                'email' => 'info@alazhar.edu.ps',
                'phone' => '082822777',
                'description' => 'جامعة حكومية أسست حديثاً.',
                
            ],
            [
                'name_ar' => 'جامعة بوليتكنك فلسطين',
                'name_en' => 'Palestine Polytechnic University',
                'abbreviation' => 'PPU',
                'city' => 'الخليل',
                'address' => 'وادي الهرية',
                'website' => 'https://www.ppu.edu',
                'email' => 'info@ppu.edu',
                'phone' => '022232700',
                'description' => 'رائدة في المجالات التقنية.',
                
            ],
            [
                'name_ar' => 'جامعة القدس',
                'name_en' => 'Al-Quds University',
                'abbreviation' => 'QU',
                'city' => 'أبو ديس',
                'address' => 'أبو ديس',
                'website' => 'https://www.alquds.edu',
                'email' => 'info@alquds.edu',
                'phone' => '022790211',
                'description' => 'جامعة شاملة في كافة التخصصات.',
                
            ],
            [
                'name_ar' => 'جامعة فلسطين التقنية - خضوري',
                'name_en' => 'Palestine Technical University - Kadoorie',
                'abbreviation' => 'PTUK',
                'city' => 'طولكرم',
                'address' => 'شارع الجامعة',
                'website' => 'https://www.ptuk.edu.ps',
                'email' => 'info@ptuk.edu.ps',
                'phone' => '092680111',
                'description' => 'متخصصة في التعليم التقني.',
                
            ],
            [
                'name_ar' => 'جامعة القدس المفتوحة',
                'name_en' => 'Al-Quds Open University',
                'abbreviation' => 'QOU',
                'city' => 'رام الله',
                'address' => 'الماصيون',
                'website' => 'https://www.qou.edu',
                'email' => 'info@qou.edu',
                'phone' => '022964444',
                'description' => 'تعليم مفتوح عن بعد.',
                
            ],
            [
                'name_ar' => 'جامعة فلسطين',
                'name_en' => 'University of Palestine',
                'abbreviation' => 'UP',
                'city' => 'الزهراء - غزة',
                'address' => 'الزهراء',
                'website' => 'https://www.up.edu.ps',
                'email' => 'info@up.edu.ps',
                'phone' => '082627777',
                'description' => 'جامعة خاصة ذات برامج متنوعة.',
                
            ],
            [
                'name_ar' => 'جامعة غزة',
                'name_en' => 'University of Gaza',
                'abbreviation' => 'UG',
                'city' => 'غزة',
                'address' => 'تل الهوا',
                'website' => 'https://www.gu.edu.ps',
                'email' => 'info@gu.edu.ps',
                'phone' => '082899999',
                'description' => 'جامعة خاصة تقدم برامج نوعية.',
                
            ],
            [
                'name_ar' => 'جامعة الأقصى',
                'name_en' => 'Al-Aqsa University',
                'abbreviation' => 'AQSA',
                'city' => 'غزة',
                'address' => 'شارع صلاح الدين',
                'website' => 'https://www.alaqsa.edu.ps',
                'email' => 'info@alaqsa.edu.ps',
                'phone' => '082641444',
                'description' => 'جامعة حكومية في غزة.',
                
            ],
            [
                'name_ar' => 'جامعة الاستقلال',
                'name_en' => 'Al-Istiqlal University',
                'abbreviation' => 'IST',
                'city' => 'أريحا',
                'address' => 'أريحا الجديدة',
                'website' => 'https://www.alistiqlal.edu.ps',
                'email' => 'info@alistiqlal.edu.ps',
                'phone' => '023232312',
                'description' => 'جامعة أمنية فريدة.',
                
            ],
            [
                'name_ar' => 'جامعة دار الكلمة',
                'name_en' => 'Dar Al-Kalima University',
                'abbreviation' => 'DAK',
                'city' => 'بيت لحم',
                'address' => 'بيت لحم - شارع القدس',
                'website' => 'https://www.daralkalima.edu.ps',
                'email' => 'info@daralkalima.edu.ps',
                'phone' => '022740444',
                'description' => 'تهتم بالفنون والثقافة.',
                
            ],
            [
                'name_ar' => 'جامعة بيت لحم',
                'name_en' => 'Bethlehem University',
                'abbreviation' => 'BU',
                'city' => 'بيت لحم',
                'address' => 'شارع القدس',
                'website' => 'https://www.bethlehem.edu',
                'email' => 'info@bethlehem.edu',
                'phone' => '022741241',
                'description' => 'جامعة كاثوليكية غير ربحية.',
                
            ],
            [
                'name_ar' => 'الجامعة الأمريكية في جنين',
                'name_en' => 'Arab American University',
                'abbreviation' => 'AAUP',
                'city' => 'جنين',
                'address' => 'جنين الجديدة',
                'website' => 'https://www.aaup.edu',
                'email' => 'info@aaup.edu',
                'phone' => '042418888',
                'description' => 'جامعة خاصة بمواصفات حديثة.',
                
            ],
            [
                'name_ar' => 'جامعة الكلية العصرية',
                'name_en' => 'Modern University College',
                'abbreviation' => 'MUC',
                'city' => 'رام الله',
                'address' => 'شارع الإرسال',
                'website' => 'https://www.muc.edu.ps',
                'email' => 'info@muc.edu.ps',
                'phone' => '022960000',
                'description' => 'كلية جامعية تقدم برامج مهنية.',
                
            ],
            [
                'name_ar' => 'جامعة فلسطين الأهلية',
                'name_en' => 'Palestine Ahliya University',
                'abbreviation' => 'PAU',
                'city' => 'بيت لحم',
                'address' => 'منطقة الخضر',
                'website' => 'https://www.paluniv.edu.ps',
                'email' => 'info@paluniv.edu.ps',
                'phone' => '022748888',
                'description' => 'جامعة خاصة بتوجه ريادي.',
                
            ],
            [
                'name_ar' => 'جامعة القدس المفتوحة - فرع الخليل',
                'name_en' => 'QOU - Hebron Branch',
                'abbreviation' => 'QOU-H',
                'city' => 'الخليل',
                'address' => 'دوار ابن رشد',
                'website' => 'https://www.qou.edu',
                'email' => 'hebron@qou.edu',
                'phone' => '022225555',
                'description' => 'فرع لجامعة القدس المفتوحة.',
                
            ],
            [
                'name_ar' => 'جامعة القدس المفتوحة - فرع طولكرم',
                'name_en' => 'QOU - Tulkarm Branch',
                'abbreviation' => 'QOU-T',
                'city' => 'طولكرم',
                'address' => 'شارع نابلس',
                'website' => 'https://www.qou.edu',
                'email' => 'tulkarm@qou.edu',
                'phone' => '092671000',
                'description' => 'فرع آخر لجامعة القدس المفتوحة.',
                
            ],
            [
                'name_ar' => 'جامعة الأمة للتعليم المفتوح',
                'name_en' => 'Ummah Open University',
                'abbreviation' => 'UOU',
                'city' => 'غزة',
                'address' => 'شارع النصر',
                'website' => 'https://www.ou.edu.ps',
                'email' => 'info@ou.edu.ps',
                'phone' => '082823456',
                'description' => 'تهتم بالتعليم الإلكتروني.',
                
            ],
        ];

        University::insert($universities);
    }
}
