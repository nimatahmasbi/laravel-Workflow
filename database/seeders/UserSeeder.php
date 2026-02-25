<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'مدیر سیستم',
            'email' => 'admin@workflow.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Create manager user
        User::create([
            'name' => 'مدیر دپارتمان',
            'email' => 'manager@workflow.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'is_active' => true,
        ]);

        // Create supervisor user
        User::create([
            'name' => 'سرپرست',
            'email' => 'supervisor@workflow.com',
            'password' => Hash::make('password'),
            'role' => 'supervisor',
            'is_active' => true,
        ]);

        // Create regular user
        User::create([
            'name' => 'کاربر عادی',
            'email' => 'user@workflow.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'is_active' => true,
        ]);
    }
}
