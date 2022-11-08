<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {
        $locations = Location::paginate();

        return $this->respondSuccess($locations);
    }


    public function show(): JsonResponse
    {
        $locations = Location::all();

        return $this->respondSuccess($locations);
    }

    public function store(): JsonResponse
    {
        $location = request()->validate([
            'owner_id' => 'required',
            'address' => 'required'
        ]);

        Location::create($location);

        return $this->respondSuccess($location, 201);
    }

    public function update(Location $location): JsonResponse
    {
        $data = request()->validate([
            'owner_id' => ['required', Rule::exists('users', 'id')],
            'address' => 'required',
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
