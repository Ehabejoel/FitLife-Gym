<?php
namespace App\Http\Controllers;

use App\Models\ClassSession;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $upcomingClasses = ClassSession::userUpcomingBookings(auth()->id())->get();
        $classesCount = $upcomingClasses->count();
        
        return view('dashboard', [
            'upcomingClasses' => $upcomingClasses,
            'classesCount' => $classesCount
        ]);
    }
}