<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaystackController;
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

Route::post('/paystack-events', [PaystackController::class, 'events']);
// Route::post('/paystack-events/check', [PaystackController::class, 'checkEvent']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
