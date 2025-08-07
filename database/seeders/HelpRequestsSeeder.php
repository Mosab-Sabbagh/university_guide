<?php

namespace Database\Seeders;

use App\Models\HelpRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HelpRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $helpRequests = [
            // طلبات مساعدة في البرمجة
            [
                'user_id' => 6, // سارة أحمد النجار
                'college_id' => 1, // كلية الهندسة
                'university_id' => 1, // الجامعة الإسلامية
                'title' => 'مشكلة في حل مسألة برمجة',
                'content' => 'أحتاج مساعدة في حل مسألة برمجة في لغة C++، المشكلة تتعلق بالمصفوفات والدوال',
                'image' => 'help_requests/programming_help.jpg',
            ],
            [
                'user_id' => 8, // نور محمود العلي
                'college_id' => 2, // كلية تكنولوجيا المعلومات
                'university_id' => 1, // الجامعة الإسلامية
                'title' => 'استفسار عن قواعد البيانات',
                'content' => 'أحتاج مساعدة في فهم العلاقات بين الجداول في قواعد البيانات',
                'image' => null,
            ],

            // طلبات مساعدة في الطب
            [
                'user_id' => 7, // عمر يوسف الشريف
                'college_id' => 4, // كلية الطب
                'university_id' => 2, // جامعة النجاح
                'title' => 'استفسار عن علم التشريح',
                'content' => 'أحتاج مساعدة في فهم تشريح الجهاز العصبي المركزي',
                'image' => 'help_requests/anatomy_help.jpg',
            ],
            [
                'user_id' => 9, // خالد عبد الرحمن أبو زيد
                'college_id' => 5, // كلية الصيدلة
                'university_id' => 2, // جامعة النجاح
                'title' => 'مشكلة في الكيمياء الصيدلانية',
                'content' => 'أحتاج مساعدة في فهم التفاعلات الكيميائية في الأدوية',
                'image' => null,
            ],

            // طلبات مساعدة في التجارة
            [
                'user_id' => 10, // ليلى أحمد الدجاني
                'college_id' => 12, // كلية التجارة
                'university_id' => 3, // جامعة بيرزيت
                'title' => 'استفسار عن المحاسبة المالية',
                'content' => 'أحتاج مساعدة في فهم القيود المحاسبية واليومية',
                'image' => 'help_requests/accounting_help.jpg',
            ],
            [
                'user_id' => 11, // ياسر محمد أبو عودة
                'college_id' => 11, // كلية الحقوق
                'university_id' => 3, // جامعة بيرزيت
                'title' => 'مشكلة في فهم القانون المدني',
                'content' => 'أحتاج مساعدة في فهم أحكام القانون المدني الفلسطيني',
                'image' => null,
            ],

            // طلبات مساعدة في العلوم الاجتماعية
            [
                'user_id' => 12, // رنا سامي النتشة
                'college_id' => 8, // كلية العلوم الاجتماعية
                'university_id' => 4, // جامعة القدس
                'title' => 'استفسار عن علم النفس',
                'content' => 'أحتاج مساعدة في فهم نظريات علم النفس المختلفة',
                'image' => 'help_requests/psychology_help.jpg',
            ],
            [
                'user_id' => 13, // أحمد علي أبو شقرة
                'college_id' => 7, // كلية الآداب
                'university_id' => 4, // جامعة القدس
                'title' => 'مشكلة في النحو العربي',
                'content' => 'أحتاج مساعدة في فهم قواعد النحو العربي المعقدة',
                'image' => null,
            ],

            // طلبات مساعدة في العلوم
            [
                'user_id' => 14, // فاطمة خالد أبو عودة
                'college_id' => 14, // كلية العلوم
                'university_id' => 5, // جامعة الخليل
                'title' => 'استفسار عن الرياضيات',
                'content' => 'أحتاج مساعدة في حل مسائل التفاضل والتكامل',
                'image' => 'help_requests/math_help.jpg',
            ],

            // طلبات مساعدة في التربية
            [
                'user_id' => 15, // محمد يوسف أبو رمان
                'college_id' => 9, // كلية التربية
                'university_id' => 6, // جامعة بيت لحم
                'title' => 'مشكلة في التربية الخاصة',
                'content' => 'أحتاج مساعدة في فهم أساليب التربية الخاصة للأطفال ذوي الاحتياجات الخاصة',
                'image' => null,
            ],

            // طلبات مساعدة في الزراعة
            [
                'user_id' => 16, // سارة أحمد أبو عودة
                'college_id' => 15, // كلية الزراعة
                'university_id' => 7, // جامعة خضوري
                'title' => 'استفسار عن العلوم الزراعية',
                'content' => 'أحتاج مساعدة في فهم تقنيات الزراعة الحديثة',
                'image' => 'help_requests/agriculture_help.jpg',
            ],

            // طلبات مساعدة في الشريعة
            [
                'user_id' => 6, // سارة أحمد النجار
                'college_id' => 10, // كلية الشريعة
                'university_id' => 8, // جامعة الأزهر
                'title' => 'مشكلة في أصول الفقه',
                'content' => 'أحتاج مساعدة في فهم أصول الفقه الإسلامي',
                'image' => null,
            ]
        ];

        HelpRequest::insert($helpRequests);
    }
} 