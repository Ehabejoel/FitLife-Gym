@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Payment Methods</div>
                <div class="card-body">
                    @if($paymentMethods->count() > 0)
                    <div class="list-group">
                        @foreach($paymentMethods as $method)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-credit-card"></i>
                                **** **** **** {{ $method->last4 }}
                            </div>
                            <form method="POST" action="{{ route('billing.method.delete', $method->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    
                    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addPaymentMethod">
                        Add Payment Method
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Payment History</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                                <td>{{ $payment->description }}</td>
                                <td>${{ number_format($payment->amount, 2) }}</td>
                                <td>{{ ucfirst($payment->status) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
