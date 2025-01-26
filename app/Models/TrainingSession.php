<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'trainer_id',
        'datetime',
        'capacity',
        'description'
    ];

    protected $casts = [
        'datetime' => 'datetime'
    ];

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'training_session_bookings')
            ->withTimestamps();
    }

    public function isFullyBooked()
    {
        return $this->members()->count() >= $this->capacity;
    }
}
