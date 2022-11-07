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
        if($user == null ){
            $user = User::factory()->create();
        }

        return [
            'owner_id' => $user->id,
            'category_id' => 1,
            'owner_name' => $user->name,
            'owner_phone' => $user->phone,
            'title' => fake()->word(),
            'currency' => 'rsd',
            'price' => fake()->numberBetween(100, 1000),
            'price_type' => fake()->word(),
            'description' => fake()->text(),
            'slug' => fake()->slug(),
            'created_by' =>$user->name,
            'updated_by' =>$user->name,
        ];
    }
}
