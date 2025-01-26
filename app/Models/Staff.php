<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'name', 'role_id', 'email', 'phone', 'address', 'status'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
