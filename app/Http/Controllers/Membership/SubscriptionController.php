<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, MembershipPlan $plan)
    {
        $subscription = auth()->user()->subscriptions()->create([
            'plan_id' => $plan->id,
            'start_date' => now(),
            'end_date' => now()->addDays($plan->duration)
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Subscription activated');
    }
}
