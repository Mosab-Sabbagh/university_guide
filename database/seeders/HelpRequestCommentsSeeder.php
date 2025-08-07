<?php

namespace Database\Seeders;

use App\Models\HelpRequestComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HelpRequestCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $comments = [
            // تعليقات على طلب المساعدة في البرمجة
            [
                'help_request_id' => 1,
                'user_id' => 4, // فاطمة علي حسن (admin)
                'content' => 'يمكنني مساعدتك في حل هذه المشكلة. المشكلة في استخدام المصفوفات مع الدوال تحتاج إلى تمرير المؤشرات بشكل صحيح.',
                'file' => 'comments/programming_solution.pdf',
            ],
            [
                'help_request_id' => 1,
                'user_id' => 8, // نور محمود العلي
                'content' => 'شكراً لك، هذا الحل ساعدني كثيراً في فهم المشكلة',
                'file' => null,
            ],

            // تعليقات على طلب المساعدة في قواعد البيانات
            [
                'help_request_id' => 2,
                'user_id' => 5, // محمد خالد الزعبي (admin)
                'content' => 'العلاقات بين الجداول تعتمد على المفاتيح الأساسية والفرعية. هل تريد مثالاً عملياً؟',
                'file' => 'comments/database_example.sql',
            ],

            // تعليقات على طلب المساعدة في الطب
            [
                'help_request_id' => 3,
                'user_id' => 4, // فاطمة علي حسن (admin)
                'content' => 'الجهاز العصبي المركزي يتكون من الدماغ والحبل الشوكي. هل تريد رسماً توضيحياً؟',
                'file' => 'comments/nervous_system_diagram.jpg',
            ],
            [
                'help_request_id' => 3,
                'user_id' => 7, // عمر يوسف الشريف
                'content' => 'نعم من فضلك، هذا سيساعدني كثيراً في الفهم',
                'file' => null,
            ],

            // تعليقات على طلب المساعدة في الصيدلة
            [
                'help_request_id' => 4,
                'user_id' => 5, // محمد خالد الزعبي (admin)
                'content' => 'التفاعلات الكيميائية في الأدوية تعتمد على نوع الدواء والجزيئات المستهدفة',
                'file' => 'comments/pharmaceutical_reactions.pdf',
            ],

            // تعليقات على طلب المساعدة في المحاسبة
            [
                'help_request_id' => 5,
                'user_id' => 4, // فاطمة علي حسن (admin)
                'content' => 'القيود المحاسبية تتبع قاعدة المدين والدائن. كل عملية لها طرفين متساويين',
                'file' => 'comments/accounting_entries.pdf',
            ],
            [
                'help_request_id' => 5,
                'user_id' => 10, // ليلى أحمد الدجاني
                'content' => 'شكراً لك، الآن فهمت القاعدة بشكل أفضل',
                'file' => null,
            ],

            // تعليقات على طلب المساعدة في القانون
            [
                'help_request_id' => 6,
                'user_id' => 5, // محمد خالد الزعبي (admin)
                'content' => 'القانون المدني الفلسطيني مستمد من القانون المصري. هل تريد مراجعة لأحكام معينة؟',
                'file' => 'comments/civil_law_guide.pdf',
            ],

            // تعليقات على طلب المساعدة في علم النفس
            [
                'help_request_id' => 7,
                'user_id' => 4, // فاطمة علي حسن (admin)
                'content' => 'نظريات علم النفس تشمل التحليل النفسي والسلوكية والمعرفية. أي نظرية تريد التركيز عليها؟',
                'file' => 'comments/psychology_theories.pdf',
            ],

            // تعليقات على طلب المساعدة في النحو
            [
                'help_request_id' => 8,
                'user_id' => 5, // محمد خالد الزعبي (admin)
                'content' => 'قواعد النحو العربي تعتمد على الإعراب والبناء. هل تريد أمثلة عملية؟',
                'file' => 'comments/grammar_examples.pdf',
            ],

            // تعليقات على طلب المساعدة في الرياضيات
            [
                'help_request_id' => 9,
                'user_id' => 4, // فاطمة علي حسن (admin)
                'content' => 'التفاضل والتكامل مرتبطان. التفاضل يجد المشتقة والتكامل يجد المساحة',
                'file' => 'comments/calculus_explanation.pdf',
            ],
            [
                'help_request_id' => 9,
                'user_id' => 14, // فاطمة خالد أبو عودة
                'content' => 'شكراً لك، هذا التوضيح ساعدني في الفهم',
                'file' => null,
            ],

            // تعليقات على طلب المساعدة في التربية الخاصة
            [
                'help_request_id' => 10,
                'user_id' => 5, // محمد خالد الزعبي (admin)
                'content' => 'أساليب التربية الخاصة تشمل التعليم الفردي والجماعي والتكيف مع الاحتياجات الخاصة',
                'file' => 'comments/special_education_methods.pdf',
            ],

            // تعليقات على طلب المساعدة في الزراعة
            [
                'help_request_id' => 11,
                'user_id' => 4, // فاطمة علي حسن (admin)
                'content' => 'تقنيات الزراعة الحديثة تشمل الزراعة المائية والذكية والزراعة العضوية',
                'file' => 'comments/modern_agriculture.pdf',
            ],

            // تعليقات على طلب المساعدة في الشريعة
            [
                'help_request_id' => 12,
                'user_id' => 5, // محمد خالد الزعبي (admin)
                'content' => 'أصول الفقه الإسلامي تشمل الأدلة الشرعية وطرق الاستنباط',
                'file' => 'comments/islamic_jurisprudence_basics.pdf',
            ]
        ];

        HelpRequestComment::insert($comments);
    }
} 