<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AutoCheckIn>
 */
class AutoCheckInFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hour' => fake()->hour,
            'days' => ['Fri', 'Sat', 'Sun', 'Mon', 'Thu', 'Wed', 'Tue'],
            'project_id' => App\Models\Project::factory(),
            'user_id' => App\Models\User::factory(),
        ];
    }
}
