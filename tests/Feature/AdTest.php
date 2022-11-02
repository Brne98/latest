<?php

namespace Tests\Feature;

use App\Models\Ad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdTest extends TestCase
{
    /** @test */
    public function a_user_can_create_an_ad()
    {
        $ad = Ad::all();
        $attributes = [
            'title' => $ad-['title'],
            'description' => $ad->description,
        ];

        $this->get('/ad', $attributes);

        $this->assertDatabaseHas('ads', $attributes );
    }


}
