<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'] ?? 'member'
        ]);
    }

    public function updateProfile($userId, $data)
    {
        return User::find($userId)->update($data);
    }

    public function changePassword($userId, $newPassword)
    {
        return User::find($userId)->update([
            'password' => Hash::make($newPassword)
        ]);
    }
}
