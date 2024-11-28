<?php

namespace Database\Factories;

use App\Models\EventPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventPrice>
 */
class EventPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(EventPrice::$type),
            'group_size' => fake()->numberBetween(1, 10),
            'price' => fake()->numberBetween(1000, 10_000),
            'reference_price' => fake()->numberBetween(12_000, 30_000),
            'valid_from' => fake()->dateTimeThisYear(),
            'valid_to' => fake()->dateTimeBetween('now', '+1 year')
        ];
    }
}
