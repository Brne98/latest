<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocationTest extends TestCase
{
    /** @test */
    public function a_user_can_see_all_locations()
    {
        $response = $this->get('/api/locations');

        $response->assertStatus(200);
    }

}
