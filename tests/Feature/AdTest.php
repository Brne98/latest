<?php

namespace Tests\Feature;

use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdTest extends TestCase
{
    use WithFaker;



    /** @test */
    public function an_ad_requires_a_title()
    {

        $attributes = [
            'title' => Ad::first()->title,
        ];

        $this->post('/api/ads', $attributes);

        $this->assertDatabaseHas('ads', $attributes);

        $this->get('api/ads')->assertSee($attributes['title']);

    }

    /** @test */
    public function an_ad_requires_a_currency()
    {

        $attributes = [
            'currency' => Ad::first()->currency,
        ];

        $this->post('/api/ads', $attributes);

        $this->assertDatabaseHas('ads', $attributes);

        $this->get('api/ads')->assertSee($attributes['currency']);

    }

    /** @test */
    public function an_ad_requires_a_price()
    {

        $attributes = [
            'price' => Ad::first()->price,
        ];

        $this->post('/api/ads', $attributes);

        $this->assertDatabaseHas('ads', $attributes);

        $this->get('api/ads')->assertSee($attributes['price']);

    }

    /** @test */
    public function an_ad_requires_a_price_type()
    {

        $attributes = [
            'price_type' => Ad::first()->price_type,
        ];

        $this->post('/api/ads', $attributes);

        $this->assertDatabaseHas('ads', $attributes);

        $this->get('api/ads')->assertSee($attributes['price_type']);

    }

    /** @test */
    public function an_ad_requires_a_description()
    {

        $attributes = [
            'description' => Ad::first()->description,
        ];

        $this->post('/api/ads', $attributes);

        $this->assertDatabaseHas('ads', $attributes);

        $this->get('api/ads')->assertSee($attributes['description']);

    }

    /** @test */
    public function an_ad_requires_a_slug()
    {

        $attributes = [
            'slug' => Ad::first()->slug,
        ];

        $this->post('/api/ads', $attributes);

        $this->assertDatabaseHas('ads', $attributes);

        $this->get('api/ads')->assertSee($attributes['slug']);

    }

    /** @test */
    public function an_ad_requires_a_owner()
    {

        $attributes = [
            'owner_name' => User::first()->name,
        ];

        $this->post('/api/ads', $attributes);

        $this->assertDatabaseHas('ads', $attributes);

        $this->get('api/ads')->assertSee($attributes['owner_name']);

    }

    /** @test */
    public function an_ad_requires_a_owner_phone()
    {

        $attributes = [
            'owner_phone' => User::first()->phone,
        ];

        $this->post('/api/ads', $attributes);

        $this->assertDatabaseHas('ads', $attributes);

        $this->get('api/ads')->assertSee($attributes['owner_phone']);

    }


}
