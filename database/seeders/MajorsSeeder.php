<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
        {
        $majors = [
            ['name_ar' => 'هندسة الحاسوب', 'name_en' => 'Computer Engineering', 'code' => 'CE'],
            ['name_ar' => 'الطب البشري', 'name_en' => 'Human Medicine', 'code' => 'HM'],
            ['name_ar' => 'التمريض', 'name_en' => 'Nursing', 'code' => 'NS'],
            ['name_ar' => 'الرياضيات', 'name_en' => 'Mathematics', 'code' => 'MATH'],
            ['name_ar' => 'فيزياء', 'name_en' => 'Physics', 'code' => 'PHY'],
            ['name_ar' => 'الكيمياء', 'name_en' => 'Chemistry', 'code' => 'CHEM'],
            ['name_ar' => 'تعليم أساسي', 'name_en' => 'Basic Education', 'code' => 'EDU1'],
            ['name_ar' => 'إدارة أعمال', 'name_en' => 'Business Administration', 'code' => 'BA'],
            ['name_ar' => 'محاسبة', 'name_en' => 'Accounting', 'code' => 'ACC'],
            ['name_ar' => 'حقوق', 'name_en' => 'Law', 'code' => 'LAW'],
            ['name_ar' => 'إعلام رقمي', 'name_en' => 'Digital Media', 'code' => 'DM'],
            ['name_ar' => 'الصحافة', 'name_en' => 'Journalism', 'code' => 'JRN'],
            ['name_ar' => 'فنون تشكيلية', 'name_en' => 'Visual Arts', 'code' => 'VA'],
            ['name_ar' => 'موسيقى', 'name_en' => 'Music', 'code' => 'MUS'],
            ['name_ar' => 'فقه وأصول', 'name_en' => 'Fiqh and Usul', 'code' => 'SHR1'],
            ['name_ar' => 'علوم القرآن', 'name_en' => 'Quranic Sciences', 'code' => 'SHR2'],
        ];

        foreach ($majors as $major) {
            Major::create([
                ...$major,
                'description' => $major['name_ar'] . ' في السياق الأكاديمي.',
            ]);
        }
    }
}
