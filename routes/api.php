<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Ads
Route::prefix('ads')->controller(AdController::class)->group(function () {
    Route::get('', 'index');
    Route::get('{ad:slug}','show');
    Route::post('', 'store');
    Route::put('{ad:slug}', 'update');
    Route::delete('{ad:slug}', 'destroy');
});

//Categories
Route::prefix('categories')->controller(CategoryController::class)->group(function () {
    Route::get('', 'index');
    Route::get('{category:slug}','show');
    Route::post('', 'store');
    Route::put('{category:slug}', 'update');
    Route::delete('{category:slug}', 'destroy');
});

//Locations
Route::prefix('locations')->controller(LocationController::class)->group(function () {
    Route::get('', 'index');
    Route::get('{location:slug}','show');
    Route::post('', 'store');
    Route::put('{location:slug}', 'update');
    Route::delete('{location:slug}', 'destroy');
});

//Users
Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('', 'index');
    Route::get('{user:slug}','show');
    Route::post('', 'store');
    Route::put('{user:slug}', 'update');
    Route::delete('{user:slug}', 'destroy');
});

//Pictures
Route::prefix('pictures')->controller(PictureController::class)->group(function () {
    Route::get('', 'index');
    Route::get('{picture:slug}','show');
    Route::post('', 'store');
    Route::put('{picture:slug}', 'update');
    Route::delete('{picture:slug}', 'destroy');
});
