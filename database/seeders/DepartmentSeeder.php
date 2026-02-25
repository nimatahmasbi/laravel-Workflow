<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create([
            'name' => 'فناوری اطلاعات',
            'description' => 'مدیریت سیستم‌های کامپیوتری و شبکه',
            'manager_name' => 'مهندس احمد محمدی',
            'phone' => '021-12345678',
            'email' => 'it@company.com',
            'is_active' => true,
        ]);

        Department::create([
            'name' => 'منابع انسانی',
            'description' => 'مدیریت پرسنل و استخدام',
            'manager_name' => 'خانم فاطمه احمدی',
            'phone' => '021-12345679',
            'email' => 'hr@company.com',
            'is_active' => true,
        ]);

        Department::create([
            'name' => 'مالی و حسابداری',
            'description' => 'مدیریت مالی و حسابداری شرکت',
            'manager_name' => 'آقای علی رضایی',
            'phone' => '021-12345680',
            'email' => 'finance@company.com',
            'is_active' => true,
        ]);

        Department::create([
            'name' => 'فروش و بازاریابی',
            'description' => 'مدیریت فروش و استراتژی‌های بازاریابی',
            'manager_name' => 'خانم مریم کریمی',
            'phone' => '021-12345681',
            'email' => 'sales@company.com',
            'is_active' => true,
        ]);

        Department::create([
            'name' => 'تولید و عملیات',
            'description' => 'مدیریت خط تولید و عملیات روزانه',
            'manager_name' => 'مهندس محسن نوری',
            'phone' => '021-12345682',
            'email' => 'production@company.com',
            'is_active' => true,
        ]);
    }
}
