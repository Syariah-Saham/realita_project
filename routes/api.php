<?php

use App\Http\Controllers\Api\AuthControllerr;
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

Route::get('/package' , function() {
    return response([
        'data' => [1,2,3]
    ] , 200);
});

Route::post('/register', [AuthControllerr::class , 'register']);

Route::middleware(('auth:sanctum'))->group(function() {
    Route::post('/logout', [AuthControllerr::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
