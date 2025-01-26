<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = auth()->user()->attendances()->latest()->get();
        return view('Member.attendance', compact('attendances'));
    }

    public function checkIn()
    {
        auth()->user()->attendances()->create([
            'check_in' => now()
        ]);
        return back()->with('success', 'Checked in successfully');
    }

    public function checkOut()
    {
        $attendance = auth()->user()->attendances()->latest()->first();
        if ($attendance) {
            $attendance->update(['check_out' => now()]);
        }
        return back()->with('success', 'Checked out successfully');
    }
}
