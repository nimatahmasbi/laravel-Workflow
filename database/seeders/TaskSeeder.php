<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use App\Models\Workflow;
use App\Models\WorkflowStep;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $workflows = Workflow::all();
        $users = User::all();

        // تسک‌های گردش کار مرخصی
        $workflow1 = $workflows->where('title', 'تایید درخواست مرخصی')->first();
        if ($workflow1) {
            $step1 = $workflow1->steps->where('name', 'ارسال درخواست')->first();
            $step2 = $workflow1->steps->where('name', 'تایید سرپرست مستقیم')->first();
            $step3 = $workflow1->steps->where('name', 'تایید مدیر منابع انسانی')->first();

            Task::create([
                'title' => 'درخواست مرخصی سالانه',
                'description' => 'درخواست مرخصی سالانه 5 روزه برای سفر خانوادگی',
                'workflow_id' => $workflow1->id,
                'workflow_step_id' => $step1->id,
                'assigned_to' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'completed',
                'priority' => 'medium',
                'due_date' => now()->addDays(7),
                'estimated_hours' => 2,
                'actual_hours' => 1,
                'completed_at' => now()->subDays(2),
            ]);

            Task::create([
                'title' => 'بررسی درخواست مرخصی احمد محمدی',
                'description' => 'بررسی و تایید درخواست مرخصی کارمند احمد محمدی',
                'workflow_id' => $workflow1->id,
                'workflow_step_id' => $step2->id,
                'assigned_to' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => now()->addDays(3),
                'estimated_hours' => 4,
                'started_at' => now()->subDays(1),
            ]);

            Task::create([
                'title' => 'تایید نهایی درخواست مرخصی',
                'description' => 'تایید نهایی درخواست مرخصی احمد محمدی',
                'workflow_id' => $workflow1->id,
                'workflow_step_id' => $step3->id,
                'assigned_to' => $users->where('email', 'fateme@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'pending',
                'priority' => 'medium',
                'due_date' => now()->addDays(5),
                'estimated_hours' => 2,
            ]);
        }

        // تسک‌های گردش کار خرید تجهیزات
        $workflow2 = $workflows->where('title', 'خرید تجهیزات IT')->first();
        if ($workflow2) {
            $step1 = $workflow2->steps->where('name', 'درخواست خرید')->first();
            $step2 = $workflow2->steps->where('name', 'تایید فنی')->first();
            $step3 = $workflow2->steps->where('name', 'تایید مالی')->first();
            $step4 = $workflow2->steps->where('name', 'تایید نهایی')->first();

            Task::create([
                'title' => 'درخواست خرید لپ‌تاپ',
                'description' => 'درخواست خرید 5 عدد لپ‌تاپ برای کارشناسان IT',
                'workflow_id' => $workflow2->id,
                'workflow_step_id' => $step1->id,
                'assigned_to' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'completed',
                'priority' => 'high',
                'due_date' => now()->addDays(10),
                'estimated_hours' => 8,
                'actual_hours' => 6,
                'completed_at' => now()->subDays(3),
            ]);

            Task::create([
                'title' => 'بررسی مشخصات فنی لپ‌تاپ‌ها',
                'description' => 'بررسی و تایید مشخصات فنی لپ‌تاپ‌های درخواستی',
                'workflow_id' => $workflow2->id,
                'workflow_step_id' => $step2->id,
                'assigned_to' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => now()->addDays(5),
                'estimated_hours' => 6,
                'started_at' => now()->subDays(2),
            ]);

            Task::create([
                'title' => 'بررسی بودجه خرید تجهیزات',
                'description' => 'بررسی بودجه و تایید مالی خرید لپ‌تاپ‌ها',
                'workflow_id' => $workflow2->id,
                'workflow_step_id' => $step3->id,
                'assigned_to' => $users->where('email', 'ali@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => now()->addDays(7),
                'estimated_hours' => 4,
            ]);

            Task::create([
                'title' => 'تایید نهایی خرید تجهیزات',
                'description' => 'تایید نهایی خرید لپ‌تاپ‌ها توسط مدیریت',
                'workflow_id' => $workflow2->id,
                'workflow_step_id' => $step4->id,
                'assigned_to' => $users->where('email', 'admin@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'ahmad@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'pending',
                'priority' => 'critical',
                'due_date' => now()->addDays(10),
                'estimated_hours' => 2,
            ]);
        }

        // تسک‌های گردش کار گزارش‌گیری
        $workflow3 = $workflows->where('title', 'گزارش‌گیری ماهانه فروش')->first();
        if ($workflow3) {
            $step1 = $workflow3->steps->where('name', 'جمع‌آوری داده‌ها')->first();
            $step2 = $workflow3->steps->where('name', 'تحلیل و بررسی')->first();
            $step3 = $workflow3->steps->where('name', 'تایید و ارسال')->first();

            Task::create([
                'title' => 'جمع‌آوری گزارش‌های فروش مناطق',
                'description' => 'جمع‌آوری گزارش‌های فروش از 8 منطقه مختلف',
                'workflow_id' => $workflow3->id,
                'workflow_step_id' => $step1->id,
                'assigned_to' => $users->where('email', 'maryam@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'maryam@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => now()->addDays(7),
                'estimated_hours' => 12,
                'started_at' => now()->subDays(3),
            ]);

            Task::create([
                'title' => 'تحلیل داده‌های فروش ماهانه',
                'description' => 'تحلیل و بررسی روند فروش و تهیه گزارش تحلیلی',
                'workflow_id' => $workflow3->id,
                'workflow_step_id' => $step2->id,
                'assigned_to' => $users->where('email', 'fateme@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'maryam@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'pending',
                'priority' => 'medium',
                'due_date' => now()->addDays(10),
                'estimated_hours' => 8,
            ]);

            Task::create([
                'title' => 'تایید و ارسال گزارش نهایی',
                'description' => 'تایید نهایی گزارش و ارسال به هیئت مدیره',
                'workflow_id' => $workflow3->id,
                'workflow_step_id' => $step3->id,
                'assigned_to' => $users->where('email', 'admin@workflow.com')->first()->id ?? $users->first()->id,
                'created_by' => $users->where('email', 'maryam@workflow.com')->first()->id ?? $users->first()->id,
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => now()->addDays(12),
                'estimated_hours' => 4,
            ]);
        }
    }
}
