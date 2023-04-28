<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ThirdPartyAuthController extends Controller
{
    public function redirectToProvider()
    {
        // 轉址到第三方認證
        return Socialite::driver('github')->redirect();
    }


    public function handleProviderCallback()
    {
        // dd(Socialite::driver('github')->user());
        // 經過 GitHub OAuth 驗證後, GitHub OAuth 透過 /auth/callback 回傳使用者資訊給專案 
        // 使用者的github資訊 設定為$user, 內含 name, email, token..等
        $user = Socialite::driver('github')->user();
        // 有拿到 GitHub OAuth 提供的使用者資訊, 表示專案第三方服務設置成功
        return "GitHub OAuth successful";
        // dd($user);
        // $user->token
    }


}
