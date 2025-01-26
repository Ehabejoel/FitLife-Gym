<?php

namespace Database\Seeders;

use App\Models\MembershipPlan;
use Illuminate\Database\Seeder;

class MembershipPlanSeeder extends Seeder
{
    public function run(): void
    {
        MembershipPlan::create([
            'name' => 'Basic',
            'price' => 29.99,
            'duration' => 30
        ]);

        MembershipPlan::create([
            'name' => 'Standard',
            'price' => 49.99,
            'duration' => 90
        ]);

        MembershipPlan::create([
            'name' => 'Premium',
            'price' => 99.99,
            'duration' => 180
        ]);
    }
}
