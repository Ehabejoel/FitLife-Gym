<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'phone', 'address', 'profile_photo', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function hasActiveSubscription()
    {
        return $this->subscription()
            ->where('end_date', '>', now())
            ->exists();
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class)->latest();
    }

    public function trainingBookings()
    {
        return $this->belongsToMany(TrainingSession::class, 'training_session_bookings');
    }

    public function trainingSessions()
    {
        return $this->hasMany(TrainingSession::class, 'trainer_id');
    }
}
