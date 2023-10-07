<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->unique()->name(), 
            'descricao' =>fake()->title(), 
            'peso' => fake()->numberBetween(1,20),
            'unidade_id' => 1,
            'fornecedor_id' => fake()->numberBetween(1,4)
        ];
    }
}
