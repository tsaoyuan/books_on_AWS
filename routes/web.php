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


Route::get('/auth/redirect', function () {
    // login 頁面點選通往Github OAtuh連結
    // 導向 GitHub OAuth 登入頁面
    // dd(Socialite::driver('github')->redirect());
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/callback', function () {

    // dd(Socialite::driver('github')->user());
    // 經過 GitHub OAuth 驗證後, GitHub OAuth 透過 /auth/callback 回傳使用者資訊給專案 
    // 使用者的github資訊 設定為$user, 內含 name, email, token..等
    $user = Socialite::driver('github')->user();
    // 有拿到 GitHub OAuth 提供的使用者資訊, 表示專案第三方服務設置成功
    return "GitHub OAuth successful"; 
    // dd($user);
    // $user->token
});
