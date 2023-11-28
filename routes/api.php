<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatoController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\SerieController;
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

Route::middleware(['api'])->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/me', [AuthController::class, 'me']);
});

Route::middleware('auth:api')->get('/paneles', [PanelController::class, 'index']);
Route::middleware('auth:api')->post('/paneles', [PanelController::class, 'store']);
Route::middleware('auth:api')->get('/paneles/{panel}', [PanelController::class, 'show']);
Route::middleware('auth:api')->put('/paneles/{panel}/series/{serie}', [PanelController::class, 'addSerie']);
Route::middleware('auth:api')->delete('/paneles/{panel}/series/{serie}', [PanelController::class, 'removeSerie']);

Route::middleware('auth:api')->get('/series', [SerieController::class, 'index']);
Route::middleware('auth:api')->get('/series/{serie}', [SerieController::class, 'show']);

Route::middleware('auth:api')->get('/datos', [DatoController::class, 'index']);
