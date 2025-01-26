<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassSchedule extends Model
{
    protected $fillable = [
        'class_name', 'instructor', 'facility_id',
        'start_time', 'end_time', 'capacity',
        'status'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
