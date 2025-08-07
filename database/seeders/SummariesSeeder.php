<?php

namespace Database\Seeders;

use App\Models\Summary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SummariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $summaries = [
            // ملخصات مساق مقدمة في البرمجة
            [
                'user_id' => 6, // سارة أحمد النجار
                'university_id' => 1,
                'college_id' => 1,
                'course_id' => 1,
                'title' => 'ملخص شامل لمقدمة في البرمجة',
                'description' => 'ملخص شامل يغطي جميع أساسيات البرمجة بلغة C++',
                'file_path' => 'summaries/programming_summary.pdf',
            ],
            [
                'user_id' => 8, // نور محمود العلي
                'university_id' => 1,
                'college_id' => 2,
                'course_id' => 1,
                'title' => 'ملخص البرمجة الهيكلية',
                'description' => 'ملخص مفصل في البرمجة الهيكلية والخوارزميات',
                'file_path' => 'summaries/structured_programming_summary.pdf',
            ],

            // ملخصات مساق هياكل البيانات
            [
                'user_id' => 6, // سارة أحمد النجار
                'university_id' => 1,
                'college_id' => 1,
                'course_id' => 2,
                'title' => 'ملخص هياكل البيانات',
                'description' => 'ملخص شامل في هياكل البيانات والخوارزميات',
                'file_path' => 'summaries/data_structures_summary.pdf',
            ],

            // ملخصات مساق الدوائر الكهربائية
            [
                'user_id' => 8, // نور محمود العلي
                'university_id' => 1,
                'college_id' => 1,
                'course_id' => 3,
                'title' => 'ملخص تحليل الدوائر الكهربائية',
                'description' => 'ملخص مفصل في تحليل الدوائر الكهربائية',
                'file_path' => 'summaries/electric_circuits_summary.pdf',
            ],

            // ملخصات مساق قواعد البيانات
            [
                'user_id' => 8, // نور محمود العلي
                'university_id' => 1,
                'college_id' => 2,
                'course_id' => 4,
                'title' => 'ملخص نظم قواعد البيانات',
                'description' => 'ملخص شامل في تصميم وإدارة قواعد البيانات',
                'file_path' => 'summaries/database_summary.pdf',
            ],

            // ملخصات مساق علم التشريح
            [
                'user_id' => 7, // عمر يوسف الشريف
                'university_id' => 2,
                'college_id' => 4,
                'course_id' => 6,
                'title' => 'ملخص تشريح جسم الإنسان',
                'description' => 'ملخص شامل في تشريح جسم الإنسان',
                'file_path' => 'summaries/anatomy_summary.pdf',
            ],

            // ملخصات مساق علم وظائف الأعضاء
            [
                'user_id' => 7, // عمر يوسف الشريف
                'university_id' => 2,
                'college_id' => 4,
                'course_id' => 7,
                'title' => 'ملخص علم وظائف الأعضاء',
                'description' => 'ملخص مفصل في وظائف أعضاء جسم الإنسان',
                'file_path' => 'summaries/physiology_summary.pdf',
            ],

            // ملخصات مساق الكيمياء الصيدلانية
            [
                'user_id' => 9, // خالد عبد الرحمن أبو زيد
                'university_id' => 2,
                'college_id' => 5,
                'course_id' => 8,
                'title' => 'ملخص الكيمياء الصيدلانية',
                'description' => 'ملخص شامل في الكيمياء الصيدلانية',
                'file_path' => 'summaries/pharmaceutical_chemistry_summary.pdf',
            ],

            // ملخصات مساق مبادئ الإدارة
            [
                'user_id' => 10, // ليلى أحمد الدجاني
                'university_id' => 3,
                'college_id' => 12,
                'course_id' => 9,
                'title' => 'ملخص مبادئ الإدارة',
                'description' => 'ملخص شامل في مبادئ وأصول الإدارة',
                'file_path' => 'summaries/management_summary.pdf',
            ],

            // ملخصات مساق المحاسبة المالية
            [
                'user_id' => 11, // ياسر محمد أبو عودة
                'university_id' => 3,
                'college_id' => 12,
                'course_id' => 10,
                'title' => 'ملخص المحاسبة المالية',
                'description' => 'ملخص مفصل في المحاسبة المالية',
                'file_path' => 'summaries/accounting_summary.pdf',
            ],

            // ملخصات مساق مقدمة في القانون
            [
                'user_id' => 11, // ياسر محمد أبو عودة
                'university_id' => 3,
                'college_id' => 11,
                'course_id' => 11,
                'title' => 'ملخص مقدمة في القانون',
                'description' => 'ملخص شامل في أساسيات العلوم القانونية',
                'file_path' => 'summaries/law_summary.pdf',
            ],

            // ملخصات مساق مقدمة في علم النفس
            [
                'user_id' => 12, // رنا سامي النتشة
                'university_id' => 4,
                'college_id' => 8,
                'course_id' => 12,
                'title' => 'ملخص علم النفس العام',
                'description' => 'ملخص شامل في علم النفس ومدارسه',
                'file_path' => 'summaries/psychology_summary.pdf',
            ],

            // ملخصات مساق النحو والصرف
            [
                'user_id' => 13, // أحمد علي أبو شقرة
                'university_id' => 4,
                'college_id' => 7,
                'course_id' => 13,
                'title' => 'ملخص النحو العربي',
                'description' => 'ملخص شامل في قواعد النحو العربي',
                'file_path' => 'summaries/grammar_summary.pdf',
            ],

            // ملخصات مساق التفاضل والتكامل
            [
                'user_id' => 14, // فاطمة خالد أبو عودة
                'university_id' => 5,
                'college_id' => 14,
                'course_id' => 14,
                'title' => 'ملخص التفاضل والتكامل',
                'description' => 'ملخص مفصل في التفاضل والتكامل',
                'file_path' => 'summaries/calculus_summary.pdf',
            ],

            // ملخصات مساق أساسيات التربية الخاصة
            [
                'user_id' => 15, // محمد يوسف أبو رمان
                'university_id' => 6,
                'college_id' => 9,
                'course_id' => 15,
                'title' => 'ملخص التربية الخاصة',
                'description' => 'ملخص شامل في التربية الخاصة وأساليبها',
                'file_path' => 'summaries/special_education_summary.pdf',
            ],

            // ملخصات مساق أساسيات الزراعة
            [
                'user_id' => 16, // سارة أحمد أبو عودة
                'university_id' => 7,
                'college_id' => 15,
                'course_id' => 16,
                'title' => 'ملخص أساسيات الزراعة',
                'description' => 'ملخص شامل في أساسيات الزراعة',
                'file_path' => 'summaries/agriculture_summary.pdf',
            ],

            // ملخصات مساق أصول الفقه
            [
                'user_id' => 6, // سارة أحمد النجار
                'university_id' => 8,
                'college_id' => 10,
                'course_id' => 17,
                'title' => 'ملخص أصول الفقه',
                'description' => 'ملخص شامل في أصول الفقه الإسلامي',
                'file_path' => 'summaries/jurisprudence_summary.pdf',
            ]
        ];

        Summary::insert($summaries);
    }
} 