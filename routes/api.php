<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
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
    Route::put('{ad:id}', 'update');
    Route::delete('{ad:id}', 'destroy');
});

Route::prefix('categories')->controller(CategoryController::class)->group(function () {
    Route::get('', 'index');
    Route::get('/all', 'show');
    Route::post('', 'store');
    Route::put('{category:id}', 'update');
    Route::delete('{category:id}', 'destroy');
});

Route::prefix('locations')->controller(LocationController::class)->group(function () {
    Route::get('', 'index');
    Route::get('all','all');
    Route::post('', 'store');
    Route::put('{location:id}', 'update');
    Route::delete('{location:id}', 'destroy');
});

Route::prefix('files')->controller(FileController::class)->group(function () {
    Route::post('upload-file', 'uploadFile');
    Route::delete('remove-temporary-file', 'removeTemporaryFile');
    Route::get('download-file/{name}', 'downloadFile');
});

Route::post('auth/register', [AuthController::class, 'createUser']);
Route::post('auth/login', [AuthController::class, 'loginUser']);
