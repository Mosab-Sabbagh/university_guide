<?php

namespace Database\Seeders;

use App\Models\BookPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $bookPosts = [
            // منشورات كتب مجانية
            [
                'user_id' => 4, // فاطمة علي حسن (admin)
                'university_id' => 1,
                'college_id' => 1,
                'title' => 'كتاب مقدمة في البرمجة - مجاني',
                'description' => 'كتاب شامل في أساسيات البرمجة بلغة C++، مناسب للمبتدئين',
                'is_free' => true,
                'price' => 0,
                'status' => 'available',
            ],
            [
                'user_id' => 5, // محمد خالد الزعبي (admin)
                'university_id' => 2,
                'college_id' => 4,
                'title' => 'كتاب علم التشريح - مجاني',
                'description' => 'كتاب شامل في تشريح جسم الإنسان مع رسوم توضيحية',
                'is_free' => true,
                'price' => 0,
                'status' => 'available',
            ],
            [
                'user_id' => 4,
                'university_id' => 3,
                'college_id' => 12,
                'title' => 'كتاب مبادئ الإدارة - مجاني',
                'description' => 'كتاب شامل في مبادئ وأصول الإدارة الحديثة',
                'is_free' => true,
                'price' => 0,
                'status' => 'available',
            ],

            // منشورات كتب مدفوعة
            [
                'user_id' => 5,
                'university_id' => 1,
                'college_id' => 2,
                'title' => 'كتاب قواعد البيانات المتقدم',
                'description' => 'كتاب متقدم في قواعد البيانات ونظم إدارتها',
                'is_free' => false,
                'price' => 50,
                'status' => 'available',
            ],
            [
                'user_id' => 4,
                'university_id' => 2,
                'college_id' => 5,
                'title' => 'كتاب الكيمياء الصيدلانية المتقدم',
                'description' => 'كتاب متخصص في الكيمياء الصيدلانية والتفاعلات',
                'is_free' => false,
                'price' => 75,
                'status' => 'available',
            ],
            [
                'user_id' => 5,
                'university_id' => 3,
                'college_id' => 11,
                'title' => 'كتاب القانون المدني',
                'description' => 'كتاب شامل في القانون المدني الفلسطيني',
                'is_free' => false,
                'price' => 60,
                'status' => 'available',
            ],
            [
                'user_id' => 4,
                'university_id' => 4,
                'college_id' => 8,
                'title' => 'كتاب علم النفس الإكلينيكي',
                'description' => 'كتاب متخصص في علم النفس الإكلينيكي والتشخيص',
                'is_free' => false,
                'price' => 80,
                'status' => 'available',
            ],
            [
                'user_id' => 5,
                'university_id' => 4,
                'college_id' => 7,
                'title' => 'كتاب النحو العربي المتقدم',
                'description' => 'كتاب متقدم في النحو العربي وقواعده',
                'is_free' => false,
                'price' => 45,
                'status' => 'available',
            ],
            [
                'user_id' => 4,
                'university_id' => 5,
                'college_id' => 14,
                'title' => 'كتاب الرياضيات المتقدمة',
                'description' => 'كتاب شامل في الرياضيات المتقدمة والتحليل',
                'is_free' => false,
                'price' => 70,
                'status' => 'available',
            ],
            [
                'user_id' => 5,
                'university_id' => 6,
                'college_id' => 9,
                'title' => 'كتاب التربية الخاصة المتقدم',
                'description' => 'كتاب متخصص في أساليب التربية الخاصة',
                'is_free' => false,
                'price' => 55,
                'status' => 'available',
            ],
            [
                'user_id' => 4,
                'university_id' => 7,
                'college_id' => 15,
                'title' => 'كتاب الزراعة الحديثة',
                'description' => 'كتاب في التقنيات الحديثة في الزراعة',
                'is_free' => false,
                'price' => 65,
                'status' => 'available',
            ],
            [
                'user_id' => 5,
                'university_id' => 8,
                'college_id' => 10,
                'title' => 'كتاب الفقه المقارن',
                'description' => 'كتاب في الفقه المقارن بين المذاهب الإسلامية',
                'is_free' => false,
                'price' => 40,
                'status' => 'available',
            ],

            // منشورات مغلقة
            [
                'user_id' => 4,
                'university_id' => 1,
                'college_id' => 1,
                'title' => 'كتاب هندسة البرمجيات - مبيعات مكتملة',
                'description' => 'كتاب في هندسة البرمجيات - تم بيع جميع النسخ',
                'is_free' => false,
                'price' => 90,
                'status' => 'closed',
            ]
        ];

        BookPost::insert($bookPosts);
    }
} 