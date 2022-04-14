<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutUs>
 */
class AboutUsFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 10),
            'description' => $this->faker->text($maxNbChars = 250),
            'img' => "",
        ];
    }
}
