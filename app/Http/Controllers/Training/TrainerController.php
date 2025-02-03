<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Models\Client;
use Carbon\Carbon;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('trainer');
    }

    public function dashboard()
    {
        $activeClientsCount = Client::where('trainer_id', auth()->id())->active()->count();
        $todaySessions = TrainingSession::where('trainer_id', auth()->id())
            ->whereDate('start_time', Carbon::today())
            ->with('client')
            ->orderBy('start_time')
            ->get();
        $todaySessionsCount = $todaySessions->count();
        
        $weeklyHours = TrainingSession::where('trainer_id', auth()->id())
            ->whereBetween('start_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('duration') / 60; // Convert minutes to hours

        $completionRate = 95; // Example static value, implement your own logic

        $recentUpdates = []; // Implement your own logic for recent updates

        return view('trainer.dashboard', compact(
            'activeClientsCount',
            'todaySessions',
            'todaySessionsCount',
            'weeklyHours',
            'completionRate',
            'recentUpdates'
        ));
    }

    public function schedule()
    {
        $sessions = TrainingSession::where('trainer_id', auth()->id())
            ->with('client')
            ->orderBy('start_time')
            ->get();
            
        return view('trainer.schedule', compact('sessions'));
    }

    public function createSessionForm()
    {
        $clients = Client::where('trainer_id', auth()->id())->get();
        return view('trainer.sessions.create', compact('clients'));
    }

    public function createSession(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'start_time' => 'required|date',
            'duration' => 'required|integer|min:15',
            'training_type' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        TrainingSession::create([
            'trainer_id' => auth()->id(),
            'client_id' => $validated['client_id'],
            'start_time' => $validated['start_time'],
            'duration' => $validated['duration'],
            'training_type' => $validated['training_type'],
            'notes' => $validated['notes'] ?? null
        ]);

        return redirect()->route('trainer.schedule')
            ->with('success', 'Training session created successfully');
    }

    public function newClient()
    {
        return view('trainer.clients.new');
    }

    public function progressReports()
    {
        $clients = Client::where('trainer_id', auth()->id())
            ->with('progressReports')
            ->get();
            
        return view('trainer.progress-reports', compact('clients'));
    }
}