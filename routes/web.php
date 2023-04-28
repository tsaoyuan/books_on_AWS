<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function () {
    return view('sessions.create');
});
Route::post('login', [\App\Http\Controllers\SessionsController::class, 'store']);
Route::get('register', [\App\Http\Controllers\WebRegisterController::class, 'create']);
Route::post('register', [\App\Http\Controllers\WebRegisterController::class, 'store']);
Route::post('logout', [\App\Http\Controllers\SessionsController::class, 'destroy']);

// GitHub OAuth 第三方登入
Route::prefix('auth')->group(function (){
    Route::get('/github',[\App\Http\Controllers\ThirdPartyAuthController::class, 'redirectToProvider']);
    Route::get('/github/callback',[\App\Http\Controllers\ThirdPartyAuthController::class, 'handleProviderCallback']);
});