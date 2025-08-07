<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $courses = [
            // مساقات كلية الهندسة - الجامعة الإسلامية
            [
                'university_id' => 1,
                'college_id' => 1,
                'major_id' => 4, // هندسة الحاسوب
                'name_ar' => 'مقدمة في البرمجة',
                'name_en' => 'Introduction to Programming',
                'code' => 'CS101',
                'description' => 'مقدمة في أساسيات البرمجة باستخدام لغة C++'
            ],
            [
                'university_id' => 1,
                'college_id' => 1,
                'major_id' => 4,
                'name_ar' => 'هياكل البيانات',
                'name_en' => 'Data Structures',
                'code' => 'CS201',
                'description' => 'دراسة هياكل البيانات الأساسية والخوارزميات'
            ],
            [
                'university_id' => 1,
                'college_id' => 1,
                'major_id' => 5, // هندسة الكهرباء
                'name_ar' => 'الدوائر الكهربائية',
                'name_en' => 'Electric Circuits',
                'code' => 'EE101',
                'description' => 'أساسيات الدوائر الكهربائية والتحليل'
            ],

            // مساقات كلية تكنولوجيا المعلومات - الجامعة الإسلامية
            [
                'university_id' => 1,
                'college_id' => 2,
                'major_id' => 11, // علوم الحاسوب
                'name_ar' => 'قواعد البيانات',
                'name_en' => 'Database Systems',
                'code' => 'IT201',
                'description' => 'تصميم وإدارة قواعد البيانات'
            ],
            [
                'university_id' => 1,
                'college_id' => 2,
                'major_id' => 12, // هندسة البرمجيات
                'name_ar' => 'هندسة البرمجيات',
                'name_en' => 'Software Engineering',
                'code' => 'IT301',
                'description' => 'مبادئ وأساليب تطوير البرمجيات'
            ],

            // مساقات كلية الطب - جامعة النجاح
            [
                'university_id' => 2,
                'college_id' => 4,
                'major_id' => 15, // الطب البشري
                'name_ar' => 'علم التشريح',
                'name_en' => 'Anatomy',
                'code' => 'MED101',
                'description' => 'دراسة تشريح جسم الإنسان'
            ],
            [
                'university_id' => 2,
                'college_id' => 4,
                'major_id' => 15,
                'name_ar' => 'علم وظائف الأعضاء',
                'name_en' => 'Physiology',
                'code' => 'MED102',
                'description' => 'دراسة وظائف أعضاء جسم الإنسان'
            ],

            // مساقات كلية الصيدلة - جامعة النجاح
            [
                'university_id' => 2,
                'college_id' => 5,
                'major_id' => 16, // دكتور صيدلة
                'name_ar' => 'الكيمياء الصيدلانية',
                'name_en' => 'Pharmaceutical Chemistry',
                'code' => 'PHARM101',
                'description' => 'أساسيات الكيمياء في الصيدلة'
            ],

            // مساقات كلية التجارة - جامعة بيرزيت
            [
                'university_id' => 3,
                'college_id' => 12,
                'major_id' => 30, // إدارة الأعمال
                'name_ar' => 'مبادئ الإدارة',
                'name_en' => 'Principles of Management',
                'code' => 'BA101',
                'description' => 'أساسيات الإدارة وأصولها'
            ],
            [
                'university_id' => 3,
                'college_id' => 12,
                'major_id' => 31, // المحاسبة
                'name_ar' => 'المحاسبة المالية',
                'name_en' => 'Financial Accounting',
                'code' => 'ACC101',
                'description' => 'أساسيات المحاسبة المالية'
            ],

            // مساقات كلية الحقوق - جامعة بيرزيت
            [
                'university_id' => 3,
                'college_id' => 11,
                'major_id' => 2, // القانون
                'name_ar' => 'مقدمة في القانون',
                'name_en' => 'Introduction to Law',
                'code' => 'LAW101',
                'description' => 'مقدمة في العلوم القانونية'
            ],

            // مساقات كلية العلوم الاجتماعية - جامعة القدس
            [
                'university_id' => 4,
                'college_id' => 8,
                'major_id' => 37, // علم النفس
                'name_ar' => 'مقدمة في علم النفس',
                'name_en' => 'Introduction to Psychology',
                'code' => 'PSYCH101',
                'description' => 'أساسيات علم النفس ومدارسه'
            ],

            // مساقات كلية الآداب - جامعة القدس
            [
                'university_id' => 4,
                'college_id' => 7,
                'major_id' => 32, // اللغة العربية
                'name_ar' => 'النحو والصرف',
                'name_en' => 'Grammar and Morphology',
                'code' => 'ARAB101',
                'description' => 'دراسة قواعد اللغة العربية'
            ],

            // مساقات كلية العلوم - جامعة الخليل
            [
                'university_id' => 5,
                'college_id' => 14,
                'major_id' => 42, // الرياضيات
                'name_ar' => 'التفاضل والتكامل',
                'name_en' => 'Calculus',
                'code' => 'MATH101',
                'description' => 'أساسيات التفاضل والتكامل'
            ],

            // مساقات كلية التربية - جامعة بيت لحم
            [
                'university_id' => 6,
                'college_id' => 9,
                'major_id' => 40, // التربية الخاصة
                'name_ar' => 'أساسيات التربية الخاصة',
                'name_en' => 'Fundamentals of Special Education',
                'code' => 'SPED101',
                'description' => 'مقدمة في التربية الخاصة وأساليبها'
            ],

            // مساقات كلية الزراعة - جامعة خضوري
            [
                'university_id' => 7,
                'college_id' => 15,
                'major_id' => 47, // العلوم الزراعية
                'name_ar' => 'أساسيات الزراعة',
                'name_en' => 'Fundamentals of Agriculture',
                'code' => 'AGRI101',
                'description' => 'مقدمة في العلوم الزراعية'
            ],

            // مساقات كلية الشريعة - جامعة الأزهر
            [
                'university_id' => 8,
                'college_id' => 10,
                'major_id' => 1, // الشريعة الإسلامية
                'name_ar' => 'أصول الفقه',
                'name_en' => 'Principles of Islamic Jurisprudence',
                'code' => 'SHARIA101',
                'description' => 'أساسيات أصول الفقه الإسلامي'
            ]
        ];

        Course::insert($courses);
    }
} 