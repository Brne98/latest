<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return $this->respondSuccess($categories);
    }

    //Problem
    public function show(Category $category): JsonResponse
    {
        return $this->respondSuccess($category, 201);

    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'parent_category' => '',
            'slug' => 'required',
        ]);

        Category::create($data);

        return $this->respondSuccess($data, 201);
    }

    public function update(Category $category)
    {
        $data = request()->validate( [
            'name' => 'required',
            'parent_category' => 'required',
            'slug' => 'required',
        ]);

        $category->update($data);

        return $this->respondSuccess($category);
    }

    public function delete(Category $category)
    {
        $category->delete();

        return $this->respondSuccess($category);
    }
}
