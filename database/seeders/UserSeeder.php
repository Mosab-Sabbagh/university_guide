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
            'name' => 'أحمد محمد أبو عودة',
            'email' => 'superadmin@universityguide.ps',
            'password' => Hash::make('123456789'), 
            'user_type' => 'super_admin',
            'is_admin' => 0,
        ]);

        // Admin Users (طلبة مع صلاحيات إدارية)
        User::create([
            'name' => 'فاطمة علي حسن',
            'email' => 'admin1@universityguide.ps',
            'password' => Hash::make('123456789'), 
            'user_type' => 'student',
            'is_admin' => 1,
        ]);

        User::create([
            'name' => 'محمد خالد الزعبي',
            'email' => 'admin2@universityguide.ps',
            'password' => Hash::make('123456789'), 
            'user_type' => 'student',
            'is_admin' => 1,
        ]);

        // تم إزالة الطلاب العاديين من هنا، لأنهم يتم إنشاؤهم في StudentSeeder
        // This section has been removed to avoid duplicate entries.
    }
}
