<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function plans()
    {
        $plans = MembershipPlan::all();
        return view('Membership.plans', compact('plans'));
    }

    public function subscriptions()
    {
        $currentSubscription = auth()->user()->subscriptions()
            ->where('status', 'active')
            ->first();
            
        $subscriptions = auth()->user()->subscriptions()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Membership.subscriptions', compact('currentSubscription', 'subscriptions'));
    }

    public function subscribe(Request $request, MembershipPlan $plan)
    {
        $subscription = auth()->user()->subscriptions()->create([
            'plan_id' => $plan->id,
            'status' => 'active',
            'start_date' => now(),
            'end_date' => now()->addMonths($plan->duration),
            'amount' => $plan->price
        ]);

        return redirect()->route('membership.subscriptions')
            ->with('success', 'Successfully subscribed to ' . $plan->name);
    }
}
