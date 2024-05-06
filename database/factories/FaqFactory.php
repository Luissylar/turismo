<?php

namespace Database\Factories;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence(rand(5, 10)), // Genera una pregunta aleatoria.
            'answer' => $this->faker->paragraph, // Genera una respuesta aleatoria.
            // 'tour_id' se asignará cuando se creen los Faqs asociados a un Tour específico.
        ];
    }
}
