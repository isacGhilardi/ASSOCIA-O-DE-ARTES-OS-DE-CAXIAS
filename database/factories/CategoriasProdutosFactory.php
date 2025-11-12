<?php

namespace Database\Factories;

use App\Models\CategoriasProdutos;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<\App\Models\CategoriasProdutos> */
class CategoriasProdutosFactory extends Factory
{
    protected $model = CategoriasProdutos::class;

    public function definition(): array
    {
        return [
            'nome_categoria' => fake()->unique()->words(asText: true),
        ];
    }
}
