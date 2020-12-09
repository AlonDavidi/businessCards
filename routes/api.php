<?php

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

Route::resource('/entities', '\App\Http\Controllers\EntitiesController', [
    'except' => ['edit', 'show', 'store']
]);

Route::get('entities/{id}', '\App\Http\Controllers\EntitiesController@fetch');
Route::post('entities', '\App\Http\Controllers\EntitiesController@create');
Route::put('entities/{id}', '\App\Http\Controllers\EntitiesController@update');
//Route::delete('entities/{id}','\App\Http\Controllers\EntitiesController@deleteEntity');
