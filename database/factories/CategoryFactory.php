<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::first();

        return [
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'created_by' =>$user->name,
            'updated_by' =>$user->name,
        ];
    }
}
