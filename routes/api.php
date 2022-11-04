<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
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

Route::prefix('ads')->controller(AdController::class)->group(function () {
    Route::get('', 'index');
    Route::get('{ad:slug}','show');
    Route::post('', 'store');
    Route::put('{ad:slug}', 'update');
    Route::delete('{ad:slug}', 'destroy');
});

Route::prefix('categories')->controller(CategoryController::class)->group(function () {
    Route::get('', 'index');
    Route::get('{category:slug}','show');
    Route::post('', 'store');
    Route::put('{category:id}', 'update');
    Route::delete('{category:id}', 'destroy');
});
