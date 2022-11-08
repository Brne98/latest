<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PictureController extends Controller
{
    public function store(): JsonResponse
    {
        $picture = request()->validate([
           'owner_id' => Rule::exists('users', 'id'),
            'ad_id' => Rule::exists('ads', 'id'),
            'title' => 'required',
            'path' => 'required',
            'ad_name' => Rule::exists('users', 'name'),
        ]);

        Picture::create($picture);

        return $this->respondSuccess($picture, 201);
    }

    public function destroy(Picture $picture): JsonResponse
    {
        Picture::delete($picture);

        return $this->respondSuccess($picture, 201);
    }
}
