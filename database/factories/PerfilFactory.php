<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perfil>
 */
class PerfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'          => fake()->text(20), 
            'description'    => fake()->text(200),
            'image'          => fake()->text(10),
            'active'         => 1,
            'user_id'        => User::first()->id
        ];
    }
}
