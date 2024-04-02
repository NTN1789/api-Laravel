<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\categoria;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faixas>
 */
class FaixasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nome = $this->faker->unique()->sentence();
       
        return [
            'nome' => $nome,
            'album' => $this->faker->text(),
            'artista' => $this->faker->text(),
            'slug' => Str::slug($nome . ' '), 
            'id_categoria' => Categoria::pluck('id')->random() ?? null,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
