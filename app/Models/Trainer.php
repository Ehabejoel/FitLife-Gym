<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name', 'specialization', 'experience', 'phone', 'email', 'status'
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
