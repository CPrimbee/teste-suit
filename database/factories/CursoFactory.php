<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo' => fake()->randomElement(['online', 'presencial']),
            'nome' => fake()->text(20),
            'descricao' => fake()->text(),
            'vagas' => fake()->numberBetween(1, 100),
            'preco' => fake()->numberBetween(1, 1000),
            'max_alunos' => fake()->numberBetween(1, 100),
            'data_inicio' => fake()->date(),
            'data_fim' => fake()->date(),
            'data_max_matricula' => fake()->date(),
            'ativo' => fake()->boolean(),
        ];
    }
}
