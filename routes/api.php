<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/movie', [App\Http\Controllers\MovieController::class, 'index']);
Route::post('/movie', [App\Http\Controllers\MovieController::class, 'store']);
Route::post('/movie/{id}', [App\Http\Controllers\MovieController::class, 'update']);
Route::delete('/movie/{id}', [App\Http\Controllers\MovieController::class, 'destroy']);

Route::get('/cinema', [App\Http\Controllers\CinemaController::class, 'index']);
Route::post('/cinema', [App\Http\Controllers\CinemaController::class, 'store']);
Route::post('/cinema/{id}', [App\Http\Controllers\CinemaController::class, 'update']);
Route::delete('/cinema/{id}', [App\Http\Controllers\CinemaController::class, 'destroy']);

Route::get('/jadwal', [App\Http\Controllers\JadwalController::class, 'index']);
Route::post('/jadwal', [App\Http\Controllers\JadwalController::class, 'store']);
Route::post('/jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'update']);
Route::delete('/jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'destroy']);

Route::get('/tiket', [App\Http\Controllers\TiketController::class, 'index']);
Route::post('/tiket/{id}', [App\Http\Controllers\TiketController::class, 'update']);
Route::delete('/tiket/{id}', [App\Http\Controllers\TiketController::class, 'destroy']);
