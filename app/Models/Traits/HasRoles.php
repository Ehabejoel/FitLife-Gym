<?php

namespace App\Models\Traits;

trait HasRoles
{
    public function isTrainer()
    {
        return in_array($this->role, ['trainer', 'instructor']) || $this->trainer()->exists();
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isMember()
    {
        return $this->role === 'member';
    }
}
