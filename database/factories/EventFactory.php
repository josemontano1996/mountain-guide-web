<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'location' => $this->faker->city,
            'duration' => $this->faker->randomElement(['1 day', '2 days', '3 days', '4 days', '5 days']),
            'available_slots' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph,
            'main_photo_path' => asset('images/pexels-tobiasbjorkli-1559825.jpg'),
            'difficulty' => $this->faker->numberBetween(1, 5),
            'beginning_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'ending_date' => $this->faker->dateTimeBetween('+1 year', '+2 years'),
            'max_group_size' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(Event::$status),
            'coordinates' => $this->faker->latitude . ',' . $this->faker->longitude,
            'slug' => $this->faker->unique()->slug,
            'display' => true,

        ];
    }
}
