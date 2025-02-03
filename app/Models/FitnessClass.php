<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FitnessClass extends Model
{
    protected $fillable = [
        'class_name',
        'description',
        'instructor_id',
        'capacity',
        'start_time',
        'end_time',
        'location',
        'image_url',
        'status'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(ClassBooking::class, 'class_id');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_time', '>=', now())
                    ->where('status', 'active')
                    ->orderBy('start_time');
    }

    // Accessor for blade template compatibility
    public function getNameAttribute()
    {
        return $this->class_name;
    }

    public function getDateAttribute()
    {
        return $this->start_time;
    }

    public function getTimeAttribute()
    {
        return $this->start_time;
    }
}
