<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Task;
use App\Models\Workflow;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_departments' => Department::count(),
            'total_workflows' => Workflow::count(),
            'total_tasks' => Task::count(),
            'pending_tasks' => Task::where('status', 'pending')->count(),
            'in_progress_tasks' => Task::where('status', 'in_progress')->count(),
            'completed_tasks' => Task::where('status', 'completed')->count(),
        ];

        $recent_workflows = Workflow::with(['department', 'creator'])
            ->latest()
            ->take(5)
            ->get();

        $recent_tasks = Task::with(['workflow', 'assignee'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('stats', 'recent_workflows', 'recent_tasks'));
    }
}
