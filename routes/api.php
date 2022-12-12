<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceUserController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources(['services' => ServiceController::class]);
Route::get('/services/search/name/{name}', [ServiceController::class, 'searchName']);

Route::resources(['experiences' => ExperienceController::class]);
Route::get('/experiences/user/{user_id}', [ExperienceController::class, 'getByUser']);

Route::resources(['perfils' => PerfilController::class]);

Route::resources(['publications' => PublicationController::class]);

Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);

Route::get('/user/authenticate', [UserController::class, 'userAuthenticate']);
Route::get('/user/is-user/{email}', [UserController::class, 'isUser']);

Route::post('/service/user', [ServiceUserController::class, 'storeArray']);

Route::post('/users', [UserController::class, 'store']);
