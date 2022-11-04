<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
   /** @test */
    public function a_category_requires_name()
    {
        $attributes = [
            'name' => Category::first()->name,
        ];

        $this->post('api/categories', $attributes);

        $this->assertDatabaseHas('categories', $attributes);

        $this->get('api/categories')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_category_requires_slug()
    {
        $attributes = [
            'slug' => Category::first()->slug,
        ];

        $this->post('api/categories', $attributes);

        $this->assertDatabaseHas('categories', $attributes);

        $this->get('api/categories')->assertSee($attributes['slug']);
    }
}
