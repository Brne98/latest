<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class AdController extends Controller
{
    public function index(): JsonResponse
    {
        $ads = Ad::paginate();

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
            'currency' => Rule::in('rsd', 'eur') ,
            'price' => 'required|numeric|min:0' ,
            'price_type' => 'required' ,
            'owner_name' => 'required' ,
            'owner_phone' => 'required' ,
            'description' => 'required' ,
        ]);

        $ad['slug'] = AdController::slug($ad['title']);

        Ad::create($ad);

        return $this->respondSuccess($ad, 201);
    }

    public function update(Ad $ad): JsonResponse
    {
        $data = request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required',
            'currency' => ['required', Rule::in('rsd', 'eur')],
            'price' => 'numeric|min:0' ,
            'price_type' => '' ,
            'owner_name' => ['required', Rule::exists('users', 'name')] ,
            'owner_phone' => ['required', Rule::exists('users', 'phone')] ,
            'description' => 'required' ,
        ]);

        $data['slug'] = AdController::slug($data['title']);

        $data['owner_id'] = 1;

        $ad->update($data);

        return $this->respondSuccess($ad);
    }

    public function destroy(Ad $ad): JsonResponse
    {
        $ad->delete();

        return $this->respondSuccess(null, 204);
    }

    public function slug($title): string
    {
        return strtolower(str_replace(' ', '-', $title));
    }


}


