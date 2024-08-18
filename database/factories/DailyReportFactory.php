<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyReport>
 */
class DailyReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'report' => fake()->text,
            'date' => fake()->date,
            'hours' => fake()->numberBetween(1, 12),
            'status' => fake()->numberBetween(1, 3),
            'user_id' => fake()->numberBetween(1, 10),
            'project_id' => fake()->numberBetween(1, 10),
        ];
    }
}
