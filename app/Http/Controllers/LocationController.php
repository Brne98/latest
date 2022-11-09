<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {

        $per_page= request('per_page');
        $page = request('page');

        $locations = [
            Location::paginate($per_page),
            Location::paginate($per_page)->currentPage($page)
            ];

        return $this->respondSuccess($locations);
    }


    public function all(): JsonResponse
    {
        $locations = Location::all();

        return $this->respondSuccess($locations);
    }

    public function store(): JsonResponse
    {
        $location = request()->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        Location::create($location);

        return $this->respondSuccess($location, 201);
    }

    public function update(Location $location): JsonResponse
    {
        $data = request()->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
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
