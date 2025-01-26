<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'Admin',
                'slug' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'Trainer',
                'slug' => 'trainer'
            ],
            [
                'id' => 3,
                'name' => 'Member',
                'slug' => 'member'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
