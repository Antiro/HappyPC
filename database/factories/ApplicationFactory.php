<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id' => rand(1, 50),
            'service_id' => rand(1, 8),
            'status_id' => rand(1, 3),
            'comment' => $this->faker->text($maxNbChars = 200),
        ];
    }
}
