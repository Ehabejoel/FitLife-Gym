<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffManagementController extends Controller
{
    public function index()
    {
        $staff = Staff::paginate(10);
        return view('admin.staff-management', compact('staff'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:100',
            'status' => 'required|boolean'
        ]);

        Staff::create($validated);
        return redirect()->route('staff.index')->with('success', 'Staff member created successfully');
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,' . $staff->id,
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:100',
            'status' => 'required|boolean'
        ]);

        $staff->update($validated);
        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully');
    }

    public function toggleStatus(Staff $staff)
    {
        $staff->status = !$staff->status;
        $staff->save();
        return response()->json(['success' => true]);
    }
}
