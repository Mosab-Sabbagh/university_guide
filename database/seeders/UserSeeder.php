<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('123456789'), 
            'user_type' => 'super_admin',
        ]);

        // Admin
        User::create([
            'name' => 'University Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'), 
            'user_type' => 'admin',
        ]);

        // Student
        User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('123456789'), 
            'user_type' => 'student',
        ]);
    }
}
