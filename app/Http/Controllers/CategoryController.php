<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;


class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return $this->respondSuccess($categories);
    }

    //Problem
    public function show(Category $category): JsonResponse
    {
        return $this->respondSuccess($category, 201);
    }

    public function store(): JsonResponse
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        Category::create($data);

        return $this->respondSuccess($data, 201);
    }

    public function update(Category $category): JsonResponse
    {
        $data = request()->validate( [
            'name' => 'required',
            'parent_category' => '',
            'slug' => 'required',
        ]);

        $category->update($data);

        return $this->respondSuccess($category);
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return $this->respondSuccess($category);
    }
}
