<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SoapUserController;
use Artisaninweb\SoapWrapper\SoapWrapper;

Route::post('/soap/items', 'SoapController@getItems');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {


    Route::post('/users', [SoapUserController::class, 'showUsers']);
    Route::post('/createuser', [SoapUserController::class, 'createUser']);

    Route::get('/rest-users', [UserController::class, 'showUsers']);
    Route::post('/rest-createuser', [UserController::class, 'createUser']);

});