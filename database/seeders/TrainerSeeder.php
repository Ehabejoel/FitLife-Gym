<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TrainerSeeder extends Seeder
{
    public function run(): void
    {
        $trainers = [
            [
                'name' => 'John Smith',
                'email' => 'john.trainer@gym.com',
                'password' => Hash::make('password123'),
                'role' => 'trainer',
                'specialties' => json_encode(['Weight Training', 'CrossFit']),
                'bio' => 'Certified personal trainer with 5 years of experience.',
                'phone' => '1234567890'
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.trainer@gym.com',
                'password' => Hash::make('password123'),
                'role' => 'trainer',
                'specialties' => json_encode(['Yoga', 'Pilates', 'Nutrition']),
                'bio' => 'Specialized in yoga and holistic wellness approaches.',
                'phone' => '0987654321'
            ],
        ];

        foreach ($trainers as $trainer) {
            User::create($trainer);
        }
    }
}
