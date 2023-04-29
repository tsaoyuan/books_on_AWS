<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ThirdPartyAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        // 轉址到第三方認證
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        try {
            //code...
            // dd(Socialite::driver('github')->user());
            // 經過 GitHub OAuth 驗證後, GitHub OAuth 透過 /auth/callback 回傳使用者資訊給專案 
            // 使用者的github資訊 設定為$githubUser, 內含 name, email, token..等
            // $githubUser = Socialite::driver($provider)->user();
            $providerUser = Socialite::driver($provider)->user();
        
            // 從 GitHub OAuth 拿到的使用者資訊, 寫入專案的 User
            $user = User::updateOrCreate([
                // 這裡使用 github_id 作為查詢欄位，如果資料庫已經有此id，則更新使用者資料
                // 如果資料庫無此id，則新增此筆資料
                // 各欄位要注意有沒有 $fillable，沒有的話寫不進去
                'github_id' => $providerUser->id,
            ], [
                'name' => $providerUser->name,
                'email' => $providerUser->email,
                'email_verified_at' => now(),
                // laravel 文件有建這些欄位, 本範例只用 github_id 判斷使用者使用有無使用第三方登入
                $provider.'_token' => $providerUser->token, // 文件有
                $provider.'_refresh_token' => $providerUser->refreshToken,
            ]);
        
            
        } catch (\Throwable $exception) {
            //throw $exception;
            logger()->error('Something went wrong', ['exception' => $exception]);
            dd($exception);
        }
        Auth::login($user);
    
        return $user;
    }
}
