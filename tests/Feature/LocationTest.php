<?php

namespace Tests\Feature;

use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationTest extends TestCase
{
    /** @test */
    public function a_user_can_see_all_locations()
    {
        $response = $this->get('/api/locations');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_change_his_location()
    {
        $location = Location::first();

        $data = [
            'owner_id' => $location->owner_id,
            'address' => $location->address,
        ];

        $response = $this->put('api/locations/' . $location->id, $data);

        $response->assertStatus(200);
    }
}
