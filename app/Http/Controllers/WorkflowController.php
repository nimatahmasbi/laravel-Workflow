<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Workflow;
use App\Models\WorkflowStep;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class WorkflowController extends Controller
{
    public function index(): View
    {
        $workflows = Workflow::with(['department', 'creator'])
            ->latest()
            ->paginate(10);
        return view('workflows.index', compact('workflows'));
    }

    public function create(): View
    {
        $departments = Department::where('is_active', true)->get();
        return view('workflows.create', compact('departments'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
            'priority' => 'required|integer|min:1|max:4',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after:start_date',
        ]);

        $validated['created_by'] = $request->user()->id;
        $workflow = Workflow::create($validated);

        return redirect()->route('workflows.show', $workflow)
            ->with('success', 'گردش کار با موفقیت ایجاد شد.');
    }

    public function show(Workflow $workflow): View
    {
        $workflow->load(['department', 'creator', 'steps.assignee', 'tasks.assignee']);
        return view('workflows.show', compact('workflow'));
    }

    public function edit(Workflow $workflow): View
    {
        $departments = Department::where('is_active', true)->get();
        return view('workflows.edit', compact('workflow', 'departments'));
    }

    public function update(Request $request, Workflow $workflow): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
            'priority' => 'required|integer|min:1|max:4',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after:start_date',
        ]);

        $workflow->update($validated);

        return redirect()->route('workflows.show', $workflow)
            ->with('success', 'گردش کار با موفقیت بروزرسانی شد.');
    }

    public function destroy(Workflow $workflow): RedirectResponse
    {
        $workflow->delete();

        return redirect()->route('workflows.index')
            ->with('success', 'گردش کار با موفقیت حذف شد.');
    }
}
