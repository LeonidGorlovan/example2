<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
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
            'name' => $this->faker->realText(20),
            'poster' => $this->faker->realText(20),
            'event_date' => $this->faker->date(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
