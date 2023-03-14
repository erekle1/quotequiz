<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quote_id'   => Quote::factory(),
            'is_correct' => $this->faker->boolean(),
            'content'    => $this->faker->firstName() . " " . $this->faker->lastName()
        ];
    }
}
