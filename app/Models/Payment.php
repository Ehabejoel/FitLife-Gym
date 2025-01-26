<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'subscription_id', 'amount', 'payment_date', 'payment_method', 
        'transaction_id', 'status'
    ];

    protected $dates = ['payment_date'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
