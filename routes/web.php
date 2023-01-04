<?php

use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome/{userId}', function (Request $request) {
    $user = User::find($request->userId);
    return view('welcome', [
        'user' => $user
    ]);
});

Route::get('/welcome-details/{publicationId}', function (Request $request) {
    $publication = Publication::find($request->publicationId);
    return view('welcome-details', [
        'publication' => $publication
    ]);
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

Route::get('/reset-password/{token}', function (Request $request) {
    return view('auth.reset-password', [
        'token' => $request->token,
        'email' => $request->email
    ]);
})->name('password.reset');