<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    public function index()
    {
        $availableSessions = TrainingSession::where('datetime', '>', now())
            ->orderBy('datetime')
            ->get();
            
        $myBookings = auth()->user()->trainingBookings()->with('trainer')->get();
        
        return view('member.training-sessions', compact('availableSessions', 'myBookings'));
    }

    public function book(TrainingSession $session)
    {
        if ($session->isFullyBooked()) {
            return back()->with('error', 'Session is fully booked');
        }

        if ($session->members()->where('user_id', auth()->id())->exists()) {
            return back()->with('error', 'You have already booked this session');
        }

        $session->members()->attach(auth()->id());
        return back()->with('success', 'Session booked successfully');
    }

    public function cancel(TrainingSession $session)
    {
        $session->members()->detach(auth()->id());
        return back()->with('success', 'Booking cancelled successfully');
    }
}
