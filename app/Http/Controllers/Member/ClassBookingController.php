<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\ClassSession;
use Illuminate\Http\Request;

class ClassBookingController extends Controller
{
    public function index()
    {
        $classes = ClassSession::upcoming()->get();
        return view('member.classes', compact('classes'));
    }

    public function book(Request $request, ClassSession $class)
    {
        if ($class->hasSpace()) {
            auth()->user()->bookings()->create(['class_session_id' => $class->id]);
            return back()->with('success', 'Class booked successfully');
        }
        return back()->with('error', 'Class is full');
    }

    public function cancel(ClassSession $class)
    {
        auth()->user()->bookings()->where('class_session_id', $class->id)->delete();
        return back()->with('success', 'Booking cancelled');
    }
}
