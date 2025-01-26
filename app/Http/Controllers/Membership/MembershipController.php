<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use App\Models\MembershipPlan;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function subscriptions()
    {
        $subscriptions = auth()->user()->subscriptions;
        $currentSubscription = auth()->user()->subscriptions()
            ->where('status', 'active')
            ->latest()
            ->first();
            
        return view('membership.subscriptions', compact('subscriptions', 'currentSubscription'));
    }

    public function subscribe(Request $request, $planId)
    {
        $plan = MembershipPlan::findOrFail($planId);
        
        $subscription = auth()->user()->subscriptions()->create([
            'membership_plan_id' => $plan->id,
            'start_date' => now(),
            'end_date' => now()->addMonths($plan->duration),
            'status' => 'active',
            'amount_paid' => $plan->price,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('membership.subscriptions')
            ->with('success', 'Successfully subscribed to ' . $plan->name);
    }

    public function plans()
    {
        $plans = MembershipPlan::all();
        $currentSubscription = auth()->user()->subscriptions()
            ->where('status', 'active')
            ->latest()
            ->first();
            
        return view('membership.plans', compact('plans', 'currentSubscription'));
    }
}
