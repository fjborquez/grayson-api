<?php

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

Route::get('/paneles', [PanelController::class, 'index']);
Route::get('/paneles/{panel}', [PanelController::class, 'show']);

Route::get('/series', [SerieController::class, 'index']);
Route::get('/series/{serie}', [SerieController::class, 'show']);

Route::get('/datos', [DatoController::class, 'index']);
