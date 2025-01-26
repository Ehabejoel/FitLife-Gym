<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'emergency_contact' => fake()->name(),
            'emergency_phone' => fake()->phoneNumber(),
            'user_id' => UserFactory::new()->create([
                'role_id' => Role::where('name', 'member')->first()->id,
            ])->id,
        ];
    }
}
