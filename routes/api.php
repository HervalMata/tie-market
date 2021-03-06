<?php

use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\Shop\ProductController;
use App\Http\Controllers\Shop\CategoryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api', 'as' => 'api.'], function () {
 Route::prefix('shop')->group(function () {
	Route::get('categories', [CategoryController::class, 'index']);
     Route::get('products', [ProductController::class, 'index']);
 });
    Route::apiResources([
        'colors', ColorController::class
    ]);
});

