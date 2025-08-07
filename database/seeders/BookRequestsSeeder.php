<?php

namespace Database\Seeders;

use App\Models\BookRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $bookRequests = [
            // طلبات معلقة
            [
                'user_id' => 6, // سارة أحمد النجار
                'book_post_id' => 4, // كتاب قواعد البيانات المتقدم
                'message' => 'أحتاج هذا الكتاب لمشروع التخرج، هل يمكنني الحصول عليه؟',
                'status' => 'pending',
            ],
            [
                'user_id' => 7, // عمر يوسف الشريف
                'book_post_id' => 5, // كتاب الكيمياء الصيدلانية المتقدم
                'message' => 'أبحث عن هذا الكتاب منذ فترة، هل هو متوفر؟',
                'status' => 'pending',
            ],
            [
                'user_id' => 8, // نور محمود العلي
                'book_post_id' => 6, // كتاب القانون المدني
                'message' => 'أحتاج هذا الكتاب لدراسة القانون المدني، شكراً',
                'status' => 'pending',
            ],

            // طلبات مقبولة
            [
                'user_id' => 9, // خالد عبد الرحمن أبو زيد
                'book_post_id' => 7, // كتاب علم النفس الإكلينيكي
                'message' => 'أحتاج هذا الكتاب لدراسة علم النفس الإكلينيكي',
                'status' => 'accepted',
            ],
            [
                'user_id' => 10, // ليلى أحمد الدجاني
                'book_post_id' => 8, // كتاب النحو العربي المتقدم
                'message' => 'أبحث عن كتاب متقدم في النحو العربي',
                'status' => 'accepted',
            ],

            // طلبات مرفوضة
            [
                'user_id' => 11, // ياسر محمد أبو عودة
                'book_post_id' => 9, // كتاب الرياضيات المتقدمة
                'message' => 'أحتاج هذا الكتاب لدراسة الرياضيات',
                'status' => 'rejected',
            ],
            [
                'user_id' => 12, // رنا سامي النتشة
                'book_post_id' => 10, // كتاب التربية الخاصة المتقدم
                'message' => 'أحتاج هذا الكتاب لدراسة التربية الخاصة',
                'status' => 'rejected',
            ],

            // طلبات إضافية
            [
                'user_id' => 13, // أحمد علي أبو شقرة
                'book_post_id' => 11, // كتاب الزراعة الحديثة
                'message' => 'أحتاج هذا الكتاب لدراسة الزراعة الحديثة',
                'status' => 'pending',
            ],
            [
                'user_id' => 14, // فاطمة خالد أبو عودة
                'book_post_id' => 12, // كتاب الفقه المقارن
                'message' => 'أبحث عن كتاب في الفقه المقارن',
                'status' => 'accepted',
            ],
            [
                'user_id' => 15, // محمد يوسف أبو رمان
                'book_post_id' => 1, // كتاب مقدمة في البرمجة - مجاني
                'message' => 'أحتاج هذا الكتاب لتعلم البرمجة',
                'status' => 'accepted',
            ],
            [
                'user_id' => 16, // سارة أحمد أبو عودة
                'book_post_id' => 2, // كتاب علم التشريح - مجاني
                'message' => 'أحتاج هذا الكتاب لدراسة الطب',
                'status' => 'accepted',
            ],
            [
                'user_id' => 6, // سارة أحمد النجار
                'book_post_id' => 3, // كتاب مبادئ الإدارة - مجاني
                'message' => 'أحتاج هذا الكتاب لدراسة الإدارة',
                'status' => 'accepted',
            ]
        ];

        BookRequest::insert($bookRequests);
    }
} 