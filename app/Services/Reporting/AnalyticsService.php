<?php

namespace App\Services\Reporting;

class AnalyticsService
{
    public function getMembershipStats()
    {
        return [
            'total_members' => User::where('role', 'member')->count(),
            'active_subscriptions' => Subscription::where('status', 'active')->count(),
            'revenue_this_month' => Payment::whereMonth('created_at', now()->month)->sum('amount')
        ];
    }

    public function getAttendanceStats($dateRange)
    {
        return Attendance::whereBetween('check_in', $dateRange)
            ->select(DB::raw('DATE(check_in) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->get();
    }
}
