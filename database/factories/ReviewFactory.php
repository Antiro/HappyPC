<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{

    public function definition()
    {
        return [
            'text' => $this->faker->text($maxNbChars = 100),
            'user_id' => rand(1, 50),
            'status_id'=>rand(1, 3),
            'service_id' => rand(1, 10),
            'evaluation_id' => rand(1, 2),
        ];
    }
}
