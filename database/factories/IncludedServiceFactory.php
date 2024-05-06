<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IncludedService>
 */

class IncludedServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //campo name
            'name' => $this->faker->sentence(rand(5, 10)),
            //campo description
            'description' => $this->faker->paragraph,
            
            
        ];
    }
}
