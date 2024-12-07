<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'content' => $this->faker->paragraph,
            'dateStart' => $this->faker->date(),
            'dateEnd' => $this->faker->date(),
            'timeStart' => $this->faker->time(),
            'timeEnd' => $this->faker->time(),
            'eventLink' => $this->faker->url,
            'dateAdded' => $this->faker->date(),
            'location_id' => 1,
            'type_id' => Type::all()->random(),
            'user_id' => User::all()->random(),
            'slug' => $this->faker->slug,
        ];
    }
}
