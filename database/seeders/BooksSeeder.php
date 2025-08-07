<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $books = [
            // كتب مساق مقدمة في البرمجة
            [
                'title' => 'مقدمة في البرمجة بلغة C++',
                'description' => 'كتاب شامل يغطي أساسيات البرمجة بلغة C++ للمبتدئين',
                'file_path' => 'books/cpp_introduction.pdf',
                'course_id' => 1,
            ],
            [
                'title' => 'أساسيات البرمجة الهيكلية',
                'description' => 'كتاب يشرح مفاهيم البرمجة الهيكلية والخوارزميات',
                'file_path' => 'books/structured_programming.pdf',
                'course_id' => 1,
            ],

            // كتب مساق هياكل البيانات
            [
                'title' => 'هياكل البيانات والخوارزميات',
                'description' => 'كتاب شامل في هياكل البيانات والخوارزميات الأساسية',
                'file_path' => 'books/data_structures.pdf',
                'course_id' => 2,
            ],

            // كتب مساق الدوائر الكهربائية
            [
                'title' => 'تحليل الدوائر الكهربائية',
                'description' => 'كتاب يشرح تحليل الدوائر الكهربائية الأساسية',
                'file_path' => 'books/electric_circuits.pdf',
                'course_id' => 3,
            ],

            // كتب مساق قواعد البيانات
            [
                'title' => 'نظم إدارة قواعد البيانات',
                'description' => 'كتاب شامل في تصميم وإدارة قواعد البيانات',
                'file_path' => 'books/database_systems.pdf',
                'course_id' => 4,
            ],

            // كتب مساق هندسة البرمجيات
            [
                'title' => 'هندسة البرمجيات - النظريات والتطبيق',
                'description' => 'كتاب يغطي جميع مراحل تطوير البرمجيات',
                'file_path' => 'books/software_engineering.pdf',
                'course_id' => 5,
            ],

            // كتب مساق علم التشريح
            [
                'title' => 'تشريح جسم الإنسان',
                'description' => 'كتاب شامل في تشريح جسم الإنسان مع الرسوم التوضيحية',
                'file_path' => 'books/human_anatomy.pdf',
                'course_id' => 6,
            ],

            // كتب مساق علم وظائف الأعضاء
            [
                'title' => 'علم وظائف الأعضاء البشرية',
                'description' => 'كتاب يشرح وظائف أعضاء جسم الإنسان',
                'file_path' => 'books/human_physiology.pdf',
                'course_id' => 7,
            ],

            // كتب مساق الكيمياء الصيدلانية
            [
                'title' => 'الكيمياء الصيدلانية الأساسية',
                'description' => 'كتاب في أساسيات الكيمياء الصيدلانية',
                'file_path' => 'books/pharmaceutical_chemistry.pdf',
                'course_id' => 8,
            ],

            // كتب مساق مبادئ الإدارة
            [
                'title' => 'مبادئ الإدارة الحديثة',
                'description' => 'كتاب شامل في مبادئ وأصول الإدارة',
                'file_path' => 'books/management_principles.pdf',
                'course_id' => 9,
            ],

            // كتب مساق المحاسبة المالية
            [
                'title' => 'المحاسبة المالية - النظرية والتطبيق',
                'description' => 'كتاب شامل في المحاسبة المالية مع أمثلة عملية',
                'file_path' => 'books/financial_accounting.pdf',
                'course_id' => 10,
            ],

            // كتب مساق مقدمة في القانون
            [
                'title' => 'مقدمة في العلوم القانونية',
                'description' => 'كتاب يشرح أساسيات العلوم القانونية',
                'file_path' => 'books/law_introduction.pdf',
                'course_id' => 11,
            ],

            // كتب مساق مقدمة في علم النفس
            [
                'title' => 'علم النفس العام',
                'description' => 'كتاب شامل في علم النفس ومدارسه المختلفة',
                'file_path' => 'books/general_psychology.pdf',
                'course_id' => 12,
            ],

            // كتب مساق النحو والصرف
            [
                'title' => 'النحو العربي - القواعد والتطبيق',
                'description' => 'كتاب شامل في قواعد النحو العربي',
                'file_path' => 'books/arabic_grammar.pdf',
                'course_id' => 13,
            ],

            // كتب مساق التفاضل والتكامل
            [
                'title' => 'التفاضل والتكامل - النظرية والتطبيق',
                'description' => 'كتاب شامل في التفاضل والتكامل مع أمثلة عملية',
                'file_path' => 'books/calculus.pdf',
                'course_id' => 14,
            ],

            // كتب مساق أساسيات التربية الخاصة
            [
                'title' => 'التربية الخاصة - الأسس والممارسات',
                'description' => 'كتاب شامل في التربية الخاصة وأساليبها',
                'file_path' => 'books/special_education.pdf',
                'course_id' => 15,
            ],

            // كتب مساق أساسيات الزراعة
            [
                'title' => 'أساسيات العلوم الزراعية',
                'description' => 'كتاب شامل في أساسيات الزراعة والمحاصيل',
                'file_path' => 'books/agriculture_basics.pdf',
                'course_id' => 16,
            ],

            // كتب مساق أصول الفقه
            [
                'title' => 'أصول الفقه الإسلامي',
                'description' => 'كتاب شامل في أصول الفقه الإسلامي',
                'file_path' => 'books/islamic_jurisprudence.pdf',
                'course_id' => 17,
            ]
        ];

        Book::insert($books);
    }
} 