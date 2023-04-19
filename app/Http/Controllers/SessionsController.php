<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }
    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|'
        ]);
        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (auth()->attempt($attributes)) {
            // 如果驗證通過
            session()->regenerate();  // 避免session fixation攻擊
            // redirect with a success flash message
            return redirect('/')->with('success', 'Welcome Back!');
        }
        // 驗證不通過
        throw ValidationException::withMessages([
            'email' => '帳號或密碼不正確，請重新輸入。'
        ]);

    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
