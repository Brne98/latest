<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::all();

        return $this->respondSuccess($users);
    }

    public function show(User $user): JsonResponse
    {
        return $this->respondSuccess($user);
    }

    public function store(): JsonResponse
    {
        $user = request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'remember_token' => 'required',
        ]);

        User::create($user);

        return $this->respondSuccess($user, 201);

    }

    public function update(User $user): JsonResponse
    {
        $user = request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'remember_token' => 'required'
        ]);

        User::update($user);

        return $this->respondSuccess($user);
    }

    public function destroy(User $user): JsonResponse
    {
        User::delete($user);

        return $this->respondSuccess(null, 204);
    }
}
