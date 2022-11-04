<?php

namespace Tests\Feature;

use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
   /** @test */
    public function a_category_requires_name()
    {
        $this->actingAs(User::factory()->create());

        $attributes = Ad::factory()->raw(['name' => '']);

        $this->post('/api/categories', $attributes)->assertInvalid('name');
    }

//    /** @test */
//    public function a_category_requires_slug()
//    {
//        $this->post('api/categories', $attributes);
//
//        $this->assertDatabaseHas('categories', $attributes);
//
//        $this->get('api/categories')->assertSee($attributes['slug']);
//    }
}
