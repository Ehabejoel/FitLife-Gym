@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">My Subscriptions</div>
        <div class="card-body">
            <h5>Current Subscription</h5>
            @if($currentSubscription)
            <div class="alert alert-info">
                <strong>Plan:</strong> {{ $currentSubscription->plan->name ?? 'N/A' }}<br>
                <strong>Status:</strong> {{ ucfirst($currentSubscription->status) }}<br>
                <strong>Expires:</strong> {{ $currentSubscription->end_date ? $currentSubscription->end_date->format('Y-m-d') : 'N/A' }}
            </div>
            @else
            <div class="alert alert-warning">
                You don't have any active subscription.
            </div>
            @endif

            <h5 class="mt-4">Subscription History</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Plan</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Amount Paid</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->plan->name ?? 'N/A' }}</td>
                        <td>{{ $subscription->start_date ? $subscription->start_date->format('Y-m-d') : 'N/A' }}</td>
                        <td>{{ $subscription->end_date ? $subscription->end_date->format('Y-m-d') : 'N/A' }}</td>
                        <td>{{ ucfirst($subscription->status) }}</td>
                        <td>${{ number_format($subscription->amount_paid ?? 0, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No subscription history found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
