<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeUniversityMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = \App\Models\University::all();
        $colleges = \App\Models\College::all();
        $majors = \App\Models\Major::all();

        // كل جامعة نضيف إلها 3-5 كليات عشوائية
        foreach ($universities as $university) {
            $randomColleges = $colleges->random(rand(3, 5));
            $university->colleges()->attach($randomColleges->pluck('id')->toArray());
        }

        // كل كلية نضيف إلها 2-4 تخصصات
        foreach ($colleges as $college) {
            $randomMajors = $majors->random(rand(2, 4));
            $college->majors()->attach($randomMajors->pluck('id')->toArray());
        }
    }
}
