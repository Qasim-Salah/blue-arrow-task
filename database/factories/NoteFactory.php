<?php

namespace Database\Factories;

use App\Enums\NoteType;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text(),
            'type' => $this->faker->randomElement([NoteType::Normal->value, NoteType::Urgent->value]),
            'user_id' => $this->faker->numberBetween(1, 20),
        ];
    }

}
