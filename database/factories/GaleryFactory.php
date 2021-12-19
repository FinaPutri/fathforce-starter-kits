<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GaleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tittle' => $this->faker->sentence(),
            'user_id' => mt_rand(1,5),
            'media' => $this->faker->mimeType(),
        ];
    }
}
