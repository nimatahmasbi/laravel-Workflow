<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use App\Models\Workflow;
use App\Models\WorkflowStep;
use Illuminate\Database\Seeder;

class WorkflowSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::all();
        $users = User::all();

        // گردش کار تایید درخواست مرخصی
        $workflow1 = Workflow::create([
            'title' => 'تایید درخواست مرخصی',
            'description' => 'فرآیند تایید درخواست‌های مرخصی کارکنان',
            'department_id' => $departments->where('name', 'منابع انسانی')->first()->id,
            'created_by' => $users->where('email', 'hr@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'active',
            'priority' => 2,
            'start_date' => now(),
            'due_date' => now()->addDays(30),
        ]);

        // مراحل گردش کار مرخصی
        WorkflowStep::create([
            'workflow_id' => $workflow1->id,
            'name' => 'ارسال درخواست',
            'description' => 'کارمند درخواست مرخصی ارسال می‌کند',
            'order' => 1,
            'status' => 'completed',
        ]);

        WorkflowStep::create([
            'workflow_id' => $workflow1->id,
            'name' => 'تایید سرپرست مستقیم',
            'description' => 'سرپرست مستقیم درخواست را بررسی می‌کند',
            'order' => 2,
            'assigned_to' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'pending',
        ]);

        WorkflowStep::create([
            'workflow_id' => $workflow1->id,
            'name' => 'تایید مدیر منابع انسانی',
            'description' => 'مدیر منابع انسانی درخواست نهایی را تایید می‌کند',
            'order' => 3,
            'assigned_to' => $users->where('email', 'fateme@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'pending',
        ]);

        // گردش کار خرید تجهیزات
        $workflow2 = Workflow::create([
            'title' => 'خرید تجهیزات IT',
            'description' => 'فرآیند خرید تجهیزات و لوازم فناوری اطلاعات',
            'department_id' => $departments->where('name', 'فناوری اطلاعات')->first()->id,
            'created_by' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'active',
            'priority' => 3,
            'start_date' => now(),
            'due_date' => now()->addDays(45),
        ]);

        // مراحل گردش کار خرید
        WorkflowStep::create([
            'workflow_id' => $workflow2->id,
            'name' => 'درخواست خرید',
            'description' => 'کارشناس IT درخواست خرید تجهیزات می‌کند',
            'order' => 1,
            'status' => 'completed',
        ]);

        WorkflowStep::create([
            'workflow_id' => $workflow2->id,
            'name' => 'تایید فنی',
            'description' => 'مدیر IT مشخصات فنی را تایید می‌کند',
            'order' => 2,
            'assigned_to' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'in_progress',
        ]);

        WorkflowStep::create([
            'workflow_id' => $workflow2->id,
            'name' => 'تایید مالی',
            'description' => 'مدیر مالی بودجه را تایید می‌کند',
            'order' => 3,
            'assigned_to' => $users->where('email', 'ali@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'pending',
        ]);

        WorkflowStep::create([
            'workflow_id' => $workflow2->id,
            'name' => 'تایید نهایی',
            'description' => 'مدیرعامل درخواست نهایی را تایید می‌کند',
            'order' => 4,
            'assigned_to' => $users->where('email', 'admin@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'pending',
        ]);

        // گردش کار گزارش‌گیری ماهانه
        $workflow3 = Workflow::create([
            'title' => 'گزارش‌گیری ماهانه فروش',
            'description' => 'فرآیند جمع‌آوری و تحلیل گزارش‌های ماهانه فروش',
            'department_id' => $departments->where('name', 'فروش و بازاریابی')->first()->id,
            'created_by' => $users->where('email', 'maryam@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'active',
            'priority' => 2,
            'start_date' => now(),
            'due_date' => now()->addDays(15),
        ]);

        // مراحل گردش کار گزارش‌گیری
        WorkflowStep::create([
            'workflow_id' => $workflow3->id,
            'name' => 'جمع‌آوری داده‌ها',
            'description' => 'جمع‌آوری داده‌های فروش از مناطق مختلف',
            'order' => 1,
            'assigned_to' => $users->where('email', 'maryam@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'in_progress',
        ]);

        WorkflowStep::create([
            'workflow_id' => $workflow3->id,
            'name' => 'تحلیل و بررسی',
            'description' => 'تحلیل داده‌ها و تهیه گزارش تحلیلی',
            'order' => 2,
            'assigned_to' => $users->where('email', 'fateme@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'pending',
        ]);

        WorkflowStep::create([
            'workflow_id' => $workflow3->id,
            'name' => 'تایید و ارسال',
            'description' => 'تایید نهایی و ارسال گزارش به مدیریت',
            'order' => 3,
            'assigned_to' => $users->where('email', 'admin@workflow.com')->first()->id ?? $users->first()->id,
            'status' => 'pending',
        ]);
    }
}
