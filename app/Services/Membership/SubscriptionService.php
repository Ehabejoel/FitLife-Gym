<?php

namespace App\Services\Membership;

class SubscriptionService
{
    public function createSubscription($memberId, $planId)
    {
        return Subscription::create([
            'member_id' => $memberId,
            'plan_id' => $planId,
            'start_date' => now(),
            'end_date' => now()->addMonths($this->getPlanDuration($planId)),
            'status' => 'active'
        ]);
    }

    public function renewSubscription($subscriptionId)
    {
        $subscription = Subscription::find($subscriptionId);
        return $subscription->update([
            'end_date' => $subscription->end_date->addMonths($this->getPlanDuration($subscription->plan_id)),
            'renewed_at' => now()
        ]);
    }

    protected function getPlanDuration($planId)
    {
        // Implementation for getting plan duration
        return 1;
    }
}
