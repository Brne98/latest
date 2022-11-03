<?php

namespace App\Http\Controllers;

use App\Models\Ad;
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
            'title' => 'required',
            'currency' => 'required' ,
            'price' => 'required' ,
            'price_type' => 'required' ,
            'owner_name' => 'required' ,
            'owner_phone' => 'required' ,
            'description' => 'required' ,
            'slug' => 'required' ,
        ]);

        Ad::create($ad);

        return $this->respondSuccess($ad);
    }

    public function update(Ad $ad) //UPDATE
    {
        $data = request()->validate([
            'title' => 'required',
            'currency' => 'required' ,
            'price' => 'required' ,
            'price_type' => 'required' ,
            'owner_name' => 'required' ,
            'owner_phone' => 'required' ,
            'description' => 'required' ,
            'slug' => 'required' ,
        ]);

        $ad->update($data);

        return $this->respondSuccess($ad);
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return $this->respondSuccess($ad);
    }
}


