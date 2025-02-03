<?php

namespace Database\Seeders;

use App\Models\ClassSession;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSessionSeeder extends Seeder
{
    private function getOrCreateInstructor($name, $email)
    {
        return User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => bcrypt('password'),
                'role' => 'instructor'
            ]
        )->id;
    }

    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // First truncate the dependent table
        DB::table('class_bookings')->truncate();
        
        // Now safe to truncate class_sessions
        DB::table('class_sessions')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        // Get or create instructors
        $instructors = [
            'yoga' => $this->getOrCreateInstructor('Sarah Wilson', 'sarah.yoga@example.com'),
            'hiit' => $this->getOrCreateInstructor('Mike Johnson', 'mike.hiit@example.com'),
            'spin' => $this->getOrCreateInstructor('Emma Rodriguez', 'emma.spin@example.com'),
            'zumba' => $this->getOrCreateInstructor('Carlos Santos', 'carlos.zumba@example.com'),
            'powerlifting' => $this->getOrCreateInstructor('John Strong', 'john.power@example.com'),
        ];

        $classes = [
            [
                'class_name' => 'Morning Yoga',
                'instructor_key' => 'yoga',
                'capacity' => 20,
                'time' => '07:00',
                'duration' => 60,
                'image_url' => 'storage/images/classes/yoga.jpg'
            ],
            [
                'class_name' => 'HIIT Training',
                'instructor_key' => 'hiit',
                'capacity' => 15,
                'time' => '09:00',
                'duration' => 45,
                'image_url' => 'storage/images/classes/hiit.jpg'
            ],
            [
                'class_name' => 'Spinning',
                'instructor_key' => 'spin',
                'capacity' => 12,
                'time' => '17:30',
                'duration' => 45,
                'image_url' => 'storage/images/classes/spinning.jpg'
            ],
            [
                'class_name' => 'Zumba',
                'instructor_key' => 'zumba',
                'capacity' => 25,
                'time' => '18:30',
                'duration' => 60,
                'image_url' => 'storage/images/classes/zumba.jpg'
            ],
            [
                'class_name' => 'Power Lifting',
                'instructor_key' => 'powerlifting',
                'capacity' => 10,
                'time' => '19:00',
                'duration' => 90,
                'image_url' => 'storage/images/classes/powerlifting.jpg'
            ]
        ];

        // Create classes for the next 7 days
        for ($i = 0; $i < 7; $i++) {
            $date = now()->addDays($i)->format('Y-m-d');
            
            foreach ($classes as $class) {
                $start_time = $date . ' ' . $class['time'];
                ClassSession::create([
                    'class_name' => $class['class_name'],
                    'image_url' => $class['image_url'],
                    'instructor_id' => $instructors[$class['instructor_key']],
                    'start_time' => $start_time,
                    'end_time' => date('Y-m-d H:i:s', strtotime($start_time . ' +' . $class['duration'] . ' minutes')),
                    'capacity' => $class['capacity'],
                    'current_bookings' => 0,
                    'status' => 'active'
                ]);
            }
        }
    }
}
