<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $payments = auth()->user()->payments()->latest()->get();
        return view('membership.billing', compact('payments'));
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string'
        ]);

        Payment::create([
            'user_id' => auth()->id(),
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'completed'
        ]);

        return back()->with('success', 'Payment processed successfully');
    }
}
