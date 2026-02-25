<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DepartmentController extends Controller
{
    public function index(): View
    {
        $departments = Department::latest()->paginate(10);
        return view('departments.index', compact('departments'));
    }

    public function create(): View
    {
        return view('departments.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'manager_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        Department::create($validated);

        return redirect()->route('departments.index')
            ->with('success', 'دپارتمان با موفقیت ایجاد شد.');
    }

    public function show(Department $department): View
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department): View
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'manager_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $department->update($validated);

        return redirect()->route('departments.index')
            ->with('success', 'دپارتمان با موفقیت بروزرسانی شد.');
    }

    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'دپارتمان با موفقیت حذف شد.');
    }
}
