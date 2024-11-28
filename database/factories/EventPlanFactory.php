<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventPlan>
 */
class EventPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'from_day' => fake()->dateTimeBetween('now', '+1 year'),
            'to_day' => fake()->dateTimeBetween('+1 year', '+2 year'),
            'title'=>fake()->title,
            'description'=>fake()->text(),
            'image_path' => asset('images/pexels-tobiasbjorkli-1559825.jpg')
        ];
    }
}
