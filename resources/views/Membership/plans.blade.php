@extends('layouts.app')

@section('content')
<div class="pricing-wrapper">
    <div class="container">
        <h2 class="text-center mb-4">Choose Your Membership</h2>
        @if($currentSubscription)
            <div class="alert alert-info text-center mb-4">
                You currently have an active subscription that expires on {{ $currentSubscription->end_date->format('M d, Y') }}
            </div>
        @endif
        <div class="row justify-content-center g-4">
            @foreach($plans as $plan)
            <div class="col-md-4">
                <div class="card pricing-card">
                    <div class="card-body p-4">
                        <div class="ribbon"></div>
                        <h4 class="plan-name">{{ $plan->name }}</h4>
                        <div class="price-tag">
                            <span class="currency">$</span>
                            <span class="amount">{{ number_format($plan->price, 0) }}</span>
                            <span class="duration">/{{ $plan->duration }}mo</span>
                        </div>
                        <div class="features">
                            <div class="feature"><i class="fas fa-check"></i> Full Access</div>
                            <div class="feature"><i class="fas fa-check"></i> Personal Trainer</div>
                            <div class="feature"><i class="fas fa-check"></i> All Classes</div>
                        </div>
                        <form action="{{ route('membership.subscribe', ['planId' => $plan->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="select-plan">Select Plan</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.pricing-wrapper {
    background: #ffffff;
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 20px 0;
}

.pricing-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    transition: all 0.2s ease;
    position: relative;
    overflow: hidden;
}

.pricing-card:hover {
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.ribbon {
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    overflow: hidden;
}

.plan-name {
    font-size: 1.25rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 1rem;
}

.price-tag {
    margin: 1.5rem 0;
    font-weight: bold;
}

.price-tag .currency {
    font-size: 1.5rem;
    color: #374151;
}

.price-tag .amount {
    font-size: 2.5rem;
    color: #111827;
}

.price-tag .duration {
    font-size: 0.875rem;
    color: #6b7280;
}

.features {
    margin: 1.5rem 0;
    padding: 1rem 0;
    border-top: 1px solid #e5e7eb;
    border-bottom: 1px solid #e5e7eb;
}

.feature {
    margin: 0.75rem 0;
    color: #4b5563;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
}

.feature i {
    color: #059669;
    margin-right: 0.75rem;
    font-size: 0.875rem;
}

.select-plan {
    width: 100%;
    padding: 0.875rem;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    background: #ffffff;
    color: #111827;
    font-weight: 500;
    transition: all 0.2s ease;
    cursor: pointer;
}

.select-plan:hover {
    background: #f3f4f6;
    border-color: #d1d5db;
}

h2 {
    color: #111827;
    font-weight: 600;
    font-size: 2rem;
    margin-bottom: 2rem;
}
</style>
@endsection
