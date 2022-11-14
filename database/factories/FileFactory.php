<?php

namespace Database\Factories;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FileFactory extends Factory
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

        $ad = Ad::first();
        if($ad == null ){
            $ad = User::factory()->create();
        }

        return [
            'owner_id' => $user->id,
            'ad_id' => $ad->id,
            'title' => fake()->word,
            'slug' => fake()->slug,
            'path' => './public/images/',
            'ad_name' => $ad->title,
            'thumbnail' => fake()->word
        ];
    }
}
