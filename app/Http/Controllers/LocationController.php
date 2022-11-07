<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {
        $locations = Location::all();

        return $this->respondSuccess($locations);
    }


    public function show(Location $location): JsonResponse
    {
        return $this->respondSuccess($location);
    }

    public function store(): JsonResponse
    {
        $location = request()->validate([

        ]);

        Ad::create($location);

        return $this->respondSuccess($location, 201);
    }

    public function update(Location $location): JsonResponse
    {
        $data = request()->validate([

        ]);


        $location->update($data);

        return $this->respondSuccess($location);
    }

    public function destroy(Location $location): JsonResponse
    {
        $location->delete();

        return $this->respondSuccess(null, 204);
    }
}
