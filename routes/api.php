<?php

use App\Http\Controllers\DatoController;
use App\Http\Controllers\SerieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidateToken;

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


Route::middleware(ValidateToken::class)->get('/series-estadisticas', [SerieController::class, 'index']);
Route::middleware(ValidateToken::class)->get('/series-estadisticas/{serie}', [SerieController::class, 'show']);
Route::middleware(ValidateToken::class)->get('/datos', [DatoController::class, 'index']);
