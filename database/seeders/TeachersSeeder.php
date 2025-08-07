<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $teachers = [
            // مدرسين كلية الهندسة - الجامعة الإسلامية
            [
                'name' => 'د. أحمد محمد أبو عودة',
                'email' => 'ahmed.abouda@iugaza.edu.ps',
                'biography' => 'دكتوراه في هندسة الحاسوب من جامعة القاهرة، خبرة 15 سنة في التدريس والبحث العلمي',
                'profile_picture' => 'teachers/ahmed_abouda.jpg',
                'phone' => '0599123456',
                'university_id' => 1,
                'college_id' => 1,
            ],
            [
                'name' => 'د. فاطمة علي النجار',
                'email' => 'fatima.najjar@iugaza.edu.ps',
                'biography' => 'دكتوراه في هندسة الكهرباء من جامعة النجاح، متخصصة في أنظمة الطاقة المتجددة',
                'profile_picture' => 'teachers/fatima_najjar.jpg',
                'phone' => '0599123457',
                'university_id' => 1,
                'college_id' => 1,
            ],

            // مدرسين كلية تكنولوجيا المعلومات - الجامعة الإسلامية
            [
                'name' => 'د. محمد خالد الزعبي',
                'email' => 'mohammed.zaabi@iugaza.edu.ps',
                'biography' => 'دكتوراه في علوم الحاسوب من جامعة بيرزيت، متخصص في الذكاء الاصطناعي',
                'profile_picture' => 'teachers/mohammed_zaabi.jpg',
                'phone' => '0599123458',
                'university_id' => 1,
                'college_id' => 2,
            ],

            // مدرسين كلية الطب - جامعة النجاح
            [
                'name' => 'د. سارة أحمد الشريف',
                'email' => 'sara.sharif@najah.edu',
                'biography' => 'دكتوراه في الطب من جامعة النجاح، متخصصة في طب الأطفال',
                'profile_picture' => 'teachers/sara_sharif.jpg',
                'phone' => '0599123459',
                'university_id' => 2,
                'college_id' => 4,
            ],
            [
                'name' => 'د. عمر يوسف الحسيني',
                'email' => 'omar.husseini@najah.edu',
                'biography' => 'دكتوراه في الطب من جامعة القدس، متخصص في الجراحة العامة',
                'profile_picture' => 'teachers/omar_husseini.jpg',
                'phone' => '0599123460',
                'university_id' => 2,
                'college_id' => 4,
            ],

            // مدرسين كلية الصيدلة - جامعة النجاح
            [
                'name' => 'د. نور محمود العلي',
                'email' => 'nour.ali@najah.edu',
                'biography' => 'دكتوراه في الصيدلة من جامعة النجاح، متخصصة في الكيمياء الصيدلانية',
                'profile_picture' => 'teachers/nour_ali.jpg',
                'phone' => '0599123461',
                'university_id' => 2,
                'college_id' => 5,
            ],

            // مدرسين كلية التجارة - جامعة بيرزيت
            [
                'name' => 'د. خالد عبد الرحمن أبو زيد',
                'email' => 'khalid.abuzaid@birzeit.edu',
                'biography' => 'دكتوراه في إدارة الأعمال من جامعة بيرزيت، متخصص في الإدارة الاستراتيجية',
                'profile_picture' => 'teachers/khalid_abuzaid.jpg',
                'phone' => '0599123462',
                'university_id' => 3,
                'college_id' => 12,
            ],
            [
                'name' => 'د. ليلى أحمد المصري',
                'email' => 'laila.masri@birzeit.edu',
                'biography' => 'دكتوراه في المحاسبة من جامعة بيرزيت، متخصصة في المحاسبة المالية',
                'profile_picture' => 'teachers/laila_masri.jpg',
                'phone' => '0599123463',
                'university_id' => 3,
                'college_id' => 12,
            ],

            // مدرسين كلية الحقوق - جامعة بيرزيت
            [
                'name' => 'د. ياسر محمد أبو رمان',
                'email' => 'yasser.aburman@birzeit.edu',
                'biography' => 'دكتوراه في القانون من جامعة بيرزيت، متخصص في القانون الدولي',
                'profile_picture' => 'teachers/yasser_aburman.jpg',
                'phone' => '0599123464',
                'university_id' => 3,
                'college_id' => 11,
            ],

            // مدرسين كلية العلوم الاجتماعية - جامعة القدس
            [
                'name' => 'د. رنا سامي النتشة',
                'email' => 'rana.natsheh@alquds.edu',
                'biography' => 'دكتوراه في علم النفس من جامعة القدس، متخصصة في علم النفس الإكلينيكي',
                'profile_picture' => 'teachers/rana_natsheh.jpg',
                'phone' => '0599123465',
                'university_id' => 4,
                'college_id' => 8,
            ],

            // مدرسين كلية الآداب - جامعة القدس
            [
                'name' => 'د. أحمد علي أبو شقرة',
                'email' => 'ahmed.abushakra@alquds.edu',
                'biography' => 'دكتوراه في اللغة العربية من جامعة القدس، متخصص في النحو والصرف',
                'profile_picture' => 'teachers/ahmed_abushakra.jpg',
                'phone' => '0599123466',
                'university_id' => 4,
                'college_id' => 7,
            ],

            // مدرسين كلية العلوم - جامعة الخليل
            [
                'name' => 'د. فاطمة خالد أبو عودة',
                'email' => 'fatima.abouda@hebron.edu',
                'biography' => 'دكتوراه في الرياضيات من جامعة الخليل، متخصصة في الجبر الخطي',
                'profile_picture' => 'teachers/fatima_abouda.jpg',
                'phone' => '0599123467',
                'university_id' => 5,
                'college_id' => 14,
            ],

            // مدرسين كلية التربية - جامعة بيت لحم
            [
                'name' => 'د. محمد يوسف أبو رمان',
                'email' => 'mohammed.aburman@bethlehem.edu',
                'biography' => 'دكتوراه في التربية من جامعة بيت لحم، متخصص في التربية الخاصة',
                'profile_picture' => 'teachers/mohammed_aburman.jpg',
                'phone' => '0599123468',
                'university_id' => 6,
                'college_id' => 9,
            ],

            // مدرسين كلية الزراعة - جامعة خضوري
            [
                'name' => 'د. سارة أحمد أبو عودة',
                'email' => 'sara.abouda@ptuk.edu.ps',
                'biography' => 'دكتوراه في العلوم الزراعية من جامعة خضوري، متخصصة في المحاصيل الحقلية',
                'profile_picture' => 'teachers/sara_abouda.jpg',
                'phone' => '0599123469',
                'university_id' => 7,
                'college_id' => 15,
            ],

            // مدرسين كلية الشريعة - جامعة الأزهر
            [
                'name' => 'د. أحمد محمد أبو عودة',
                'email' => 'ahmed.abouda@alazhar.edu.ps',
                'biography' => 'دكتوراه في الشريعة الإسلامية من جامعة الأزهر، متخصص في أصول الفقه',
                'profile_picture' => 'teachers/ahmed_abouda_sharia.jpg',
                'phone' => '0599123470',
                'university_id' => 8,
                'college_id' => 10,
            ]
        ];

        Teacher::insert($teachers);
    }
} 