<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserLogin;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserLogin>
 */
class UserLoginFactory extends Factory
{
    protected $model = UserLogin::class;  // Asegura que esto esté dentro de la clase, no dentro de la función.

    public function definition(): array
    {
        return [
            'ip_address' => $this->faker->ipv4(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'state_name' => $this->faker->state(),
            'created_at' => $this->faker->dateTimeBetween('2020-01-01', '2023-12-31'),
            'updated_at' => $this->faker->dateTimeBetween('2020-01-01', '2023-12-31'),
        ];
        
    }
}
