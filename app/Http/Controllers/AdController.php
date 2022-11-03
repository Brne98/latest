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

    public function show(Ad $ad)
    {
        return [
            'ad' => $ad
        ];
    }

    public function store() //STORE
    {
        $ad = request()->validate([
            'owner_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'currency' => 'required' ,
            'price' => 'required' ,
            'price_type' => 'required' ,
            'owner_name' => 'required' ,
            'owner_phone' => 'required' ,
            'description' => 'required' ,
            'slug' => 'required' ,
        ]);

//        $ad['owner_id'] = 1;

        Ad::create($ad);

        return $this->respondSuccess($ad, 201);
    }

    public function update(Ad $ad) //UPDATE
    {
        $data = request()->validate([
            'category_id' => 'required',
            'title' => 'required',
            'currency' => 'required' ,
            'price' => 'required' ,
            'price_type' => 'required' ,
            'owner_name' => 'required' ,
            'owner_phone' => 'required' ,
            'description' => 'required' ,
            'slug' => 'required' ,
        ]);

        $data['owner_id'] = 1;

        $ad->update($data);

        return $this->respondSuccess($ad);
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return $this->respondSuccess($ad, 204);
    }
}


