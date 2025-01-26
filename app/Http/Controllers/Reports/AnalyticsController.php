<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;

class AnalyticsController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_members' => \App\Models\User::members()->count(),
            'active_subscriptions' => \App\Models\Subscription::active()->count(),
            'monthly_revenue' => \App\Models\Payment::thisMonth()->sum('amount')
        ];
        
        return view('admin.analytics', compact('stats'));
    }
}
