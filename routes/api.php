<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataProviderController;

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

    Route::get('v1/users', [UserController::class,'index']);
    //You can try all types of filter like this
    Route::get('v1/users?currency=USD&balanceMin=10&balanceMax=100', [UserController::class,'index']);
    Route::get('v1/users?provider=DataProviderX', [UserController::class,'index']);

