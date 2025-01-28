<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassBooking extends Model
{
    protected $fillable = [
        'user_id',
        'class_id',
        'status',
        'booking_date',
    ];

    protected $casts = [
        'booking_date' => 'datetime',
    ];

    /**
     * Get the user that owns the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the class that was booked.
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo(FitnessClass::class, 'class_id');
    }
}
