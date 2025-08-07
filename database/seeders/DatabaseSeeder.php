<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // السيدرز الأساسية (يجب أن تكون أولاً)
            UserSeeder::class,
            UniversitiesSeeder::class,
            CollegesSeeder::class,
            MajorsSeeder::class,
            CollegeUniversityMajorSeeder::class,
            StudentSeeder::class,
            
            // السيدرز الجديدة
            CoursesSeeder::class,
            TeachersSeeder::class,
            TeacherCourseSeeder::class,
            BooksSeeder::class,
            BookPostsSeeder::class,
            BookRequestsSeeder::class,
            HelpRequestsSeeder::class,
            HelpRequestCommentsSeeder::class,
            SummariesSeeder::class,
        ]);
    }
}
