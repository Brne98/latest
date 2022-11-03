<?php

use App\Http\Controllers\AdController;
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

Route::prefix('ads')->group(function () {
    Route::get('', [AdController::class, 'index']);
    Route::get('{ad:slug}',[AdController::class, 'show']);
    Route::post('', [AdController::class, 'store']);
    Route::put('{ad:id}', [AdController::class, 'update']);
    Route::delete('{ad:id}', [AdController::class, 'destroy']);
});
