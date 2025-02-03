<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'image_url',
        'instructor_id',
        'start_time',
        'end_time',
        'capacity',
        'current_bookings',
        'status'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function scopeUpcoming($query)
    {
        return $query->where('start_time', '>', now())->orderBy('start_time');
    }

    public function scopeUserUpcomingBookings($query, $userId)
    {
        return $query->select('class_sessions.*')
            ->join('class_bookings', 'class_sessions.id', '=', 'class_bookings.class_session_id')
            ->where('class_bookings.user_id', $userId)
            ->where('class_sessions.start_time', '>', now())
            ->orderBy('class_sessions.start_time')
            ->limit(3);
    }

    public function hasSpace()
    {
        return $this->current_bookings < $this->capacity;
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
