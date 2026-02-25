<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Workflow;
use App\Models\WorkflowStep;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::with(['workflow', 'workflowStep', 'assignee'])
            ->latest()
            ->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        $workflows = Workflow::where('status', 'active')->get();
        $workflowSteps = WorkflowStep::all();
        $users = User::all();
        return view('tasks.create', compact('workflows', 'workflowSteps', 'users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'workflow_id' => 'required|exists:workflows,id',
            'workflow_step_id' => 'required|exists:workflow_steps,id',
            'assigned_to' => 'nullable|exists:users,id',
            'priority' => 'required|in:low,medium,high,critical',
            'due_date' => 'nullable|date',
            'estimated_hours' => 'nullable|integer|min:1',
        ]);

        $validated['created_by'] = $request->user()->id;
        $task = Task::create($validated);

        return redirect()->route('tasks.show', $task)
            ->with('success', 'تسک با موفقیت ایجاد شد.');
    }

    public function show(Task $task): View
    {
        $task->load(['workflow', 'workflowStep', 'assignee', 'creator', 'comments.user']);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        $workflows = Workflow::where('status', 'active')->get();
        $workflowSteps = WorkflowStep::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'workflows', 'workflowSteps', 'users'));
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'workflow_id' => 'required|exists:workflows,id',
            'workflow_step_id' => 'required|exists:workflow_steps,id',
            'assigned_to' => 'nullable|exists:users,id',
            'priority' => 'required|in:low,medium,high,critical',
            'due_date' => 'nullable|date',
            'estimated_hours' => 'nullable|integer|min:1',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.show', $task)
            ->with('success', 'تسک با موفقیت بروزرسانی شد.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'تسک با موفقیت حذف شد.');
    }
}
