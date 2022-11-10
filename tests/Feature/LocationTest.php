<?php

namespace Tests\Feature;

use App\Http\Controllers\LocationController;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LocationTest extends TestCase
{
    /** @test */
    public function a_user_can_see_all_locations()
    {
        $response = $this->get('/api/locations/all');

        $expected = Location::count();

        $actual = count($response['data']);

        $this->assertEquals($expected, $actual);

        $response->assertStatus(200);
    }

    /** @test */
    public function per_page_test()
    {
        $perPage = 7;
        $response = $this->get('api/locations?per_page=' . $perPage);

        $actual = count($response['data']['data']);

        $this->assertLessThanOrEqual($perPage, $actual);

        if ($actual != $perPage)
            $this->assertEquals($actual, $response['data']['total']);

    }

}
