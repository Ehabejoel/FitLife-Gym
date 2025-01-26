<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facility extends Model
{
    protected $fillable = [
        'name', 'description', 'status', 'capacity'
    ];

    public function equipment(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }
}
