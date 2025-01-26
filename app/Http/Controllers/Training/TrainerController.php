<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function schedule()
    {
        $sessions = auth()->user()->trainingSessions()->upcoming()->get();
        return view('trainer.schedule', compact('sessions'));
    }

    public function createSession(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'datetime' => 'required|date',
            'capacity' => 'required|integer'
        ]);
        
        auth()->user()->trainingSessions()->create($validated);
        return back()->with('success', 'Session created');
    }
}
