<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdController extends Controller
{
    public function index(): JsonResponse
    {
        $ads = Ad::all();

        return $this->respondSuccess($ads);
    }


    public function show(Ad $ad): JsonResponse
    {
        return $this->respondSuccess($ad);
    }

    public function store(): JsonResponse
    {
        $ad = request()->validate([
            'owner_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'currency' => 'required' ,
            'price' => 'required|numeric|min:0' ,
            'price_type' => 'required' ,
            'owner_name' => 'required' ,
            'owner_phone' => 'required' ,
            'description' => 'required' ,
            'slug' => 'required' ,
        ]);

        Ad::create($ad);

        return $this->respondSuccess($ad, 201);
    }

    public function update(Ad $ad): JsonResponse
    {
        $data = request()->validate([
            'category_id' => '',
            'title' => '',
            'currency' => '' ,
            'price' => 'numeric|min:0' ,
            'price_type' => '' ,
            'owner_name' => '' ,
            'owner_phone' => '' ,
            'description' => '' ,
            'slug' => '' ,
        ]);

        $data['owner_id'] = 1;

        $ad->update($data);

        return $this->respondSuccess($ad);
    }

    public function destroy(Ad $ad): JsonResponse
    {
        $ad->delete();

        return $this->respondSuccess(null, 204);
    }
}


