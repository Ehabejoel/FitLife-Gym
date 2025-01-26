<?php

namespace Database\Seeders;

use App\Models\TrainingSession;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TrainingSessionSeeder extends Seeder
{
    public function run()
    {
        // Create a trainer user if none exists
        $trainer = User::where('role_id', 2)->first() ?? User::create([
            'name' => 'John Trainer',
            'email' => 'trainer@gym.com',
            'password' => Hash::make('password'),
            'role_id' => 2, // Assuming 2 is trainer role_id
            'status' => 1
        ]);

        // Create sample sessions
        $sessions = [
            [
                'title' => 'Morning Workout',
                'datetime' => now()->addDays(1)->setHour(8),
                'capacity' => 5,
                'trainer_id' => $trainer->id
            ],
            [
                'title' => 'Evening HIIT',
                'datetime' => now()->addDays(1)->setHour(18),
                'capacity' => 8,
                'trainer_id' => $trainer->id
            ],
            [
                'title' => 'Weekend Special',
                'datetime' => now()->addDays(3)->setHour(10),
                'capacity' => 10,
                'trainer_id' => $trainer->id
            ],
        ];

        foreach ($sessions as $session) {
            TrainingSession::create($session);
        }
    }
}
