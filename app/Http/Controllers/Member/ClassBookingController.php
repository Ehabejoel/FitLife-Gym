<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\ClassSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            DB::transaction(function () use ($class) {
                auth()->user()->bookings()->create([
                    'class_session_id' => $class->id,
                    'booking_date' => now(),
                    'status' => 'confirmed'
                ]);
                
                $class->increment('current_bookings');
            });
            
            return back()->with('success', 'Class booked successfully');
        }
        return back()->with('error', 'Class is full');
    }

    public function cancel(ClassSession $class)
    {
        DB::transaction(function () use ($class) {
            auth()->user()->bookings()
                ->where('class_session_id', $class->id)
                ->delete();
            
            $class->decrement('current_bookings');
        });
        
        return back()->with('success', 'Booking cancelled');
    }
}
