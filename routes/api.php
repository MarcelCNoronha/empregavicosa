<?php

use App\Http\Controllers\ExperienceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::delete('/services/{id}', [ServiceController::class, 'delete']);
Route::post('/services', [ServiceController::class, 'create']);
Route::put('/services', [ServiceController::class, 'update']);

Route::get('/services/search/name/{name}', [ServiceController::class, 'searchName']);

Route::get('/experiences', [ExperienceController::class, 'index']);
Route::get('/experiences/{id}', [ExperienceController::class, 'show']);
Route::delete('/experiences/{id}', [ExperienceController::class, 'delete']);
Route::post('/experiences', [ExperienceController::class, 'create']);
Route::put('/experiences', [ExperienceController::class, 'update']);
Route::get('/experiences/user/{user_id}', [ExperienceController::class, 'getByUser']);