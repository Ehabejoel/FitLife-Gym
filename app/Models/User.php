<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'phone', 'address', 'profile_photo', 'status', 'role', 'specialties', 'bio'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'specialties' => 'array',
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

    /**
     * Get the class bookings for the user.
     */
    public function bookings()
    {
        return $this->hasMany(ClassBooking::class);
    }

    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }

    public function isTrainer()
    {
        return $this->role === 'trainer';
    }
}
