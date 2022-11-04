<?php

namespace Database\Factories;

use App\Models\Ad;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use function PHPUnit\Framework\isNull;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Picture>
 */
class PictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user=User::first();

        $ad= Ad::first();
        if($ad !== null){
            $title = $ad->title;
        } else {
            $title = Ad::factory()->create()->title;
        }

        return [
            'owner_id' => $user['id'],
            'ad_id' => 1,
            'title' => fake()->word,
            'path' => './public/images/illustration-5.png',
            'ad_name' => $title,
            'order' => fake()->word,
            'created_by' =>$user['name'],
            'updated_by' =>$user['name'],
        ];
    }
}
