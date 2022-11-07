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
    public function a_user_can_see_all_ads()
    {
        $response = $this->get('/api/ads');

        $response->assertStatus(200);

    }

    /** @test */
    public function a_user_can_see_a_single_ad()
    {
        $ad = Ad::factory()->create();

        $response = $this->get('/api/ads/' . $ad->slug);

        $response->assertStatus(200);

    }

    /** @test  */
    public function a_user_can_create_an_ad()
    {
        $ad = Ad::factory()->raw();

        $response = $this->post('api/ads', $ad);

        $response->assertStatus(201);
    }

    /** @test */
    public function a_user_can_update_an_ad()
    {
        $ad = Ad::first();

        $data = [
            'category_id' => $ad->category_id,
            'title' => $ad->title,
            'currency' => $ad->currency ,
            'price' => $ad->price ,
            'price_type' => $ad->price_type ,
            'owner_name' => $ad->owner_name ,
            'owner_phone' => $ad->owner_phone ,
            'description' => $ad->description ,
            'slug' => $ad->slug,
        ];

        $data['title'] = 'foo';

        $response = $this->put('api/ads/' . $ad->id, $data);

        $response->assertStatus(200);

    }

    /** @test */
    public function a_user_can_delete_an_ad()
    {
        $ad = Ad::first();

        $response = $this->delete('api/ads/' . $ad->id, $ad);

        $response->assertStatus(204);
    }

    /** @test  */
    public function currency_must_be_rsd_or_usd()
    {
        $ad = Ad::first();

        $data = [
            'currency' => $ad->currency,
        ];

        if(in_array('rsd', $data) == true || in_array('usd', $data) == true)
        {
            $status = 200;
        } else {
            $status = 404;
        }

        $response = $this->get('api/ads');

        $response->assertStatus($status);
    }

}
