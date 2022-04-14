<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'class_id' => rand(1, 2),
            'description' => $this->faker->text($maxNbChars = 80),
            'name'=>$this->faker->text($maxNbChars = 30),
            'prise' => rand(1, 35) * 100,
        ];
    }
}
