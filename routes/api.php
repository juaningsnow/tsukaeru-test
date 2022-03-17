<?php

use App\Http\Controllers\CurrencyApiController;
use App\Http\Controllers\TokenApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('tokens', [TokenApiController::class, 'getToken']);

Route::get('/currencies', [CurrencyApiController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/currency/{code}', [CurrencyApiController::class, 'show'])->middleware(['auth:sanctum']);
