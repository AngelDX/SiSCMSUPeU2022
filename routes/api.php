<?php

use App\Http\Controllers\CategoryRestController;
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
Route::get('/categories',[CategoryRestController::class,'index']);
Route::post('/categories',[CategoryRestController::class,'store']);
Route::put('/categories/{category}',[CategoryRestController::class,'update']);
Route::delete('/categories/{category}',[CategoryRestController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
