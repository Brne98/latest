<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
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
            'title' => fake()->word(),
            'currency' => fake()->word(),
            'price' => fake()->numberBetween(100, 1000),
            'price_type' => fake()->word(),
            'description' => fake()->text(),
            'slug' => fake()->slug(),
            'created_by' =>$user['name'],
            'updated_by' =>$user['name'],
        ];
    }
}
