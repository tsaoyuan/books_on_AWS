<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\FlareClient\Http\Response;

class WebRegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|min:5|max:255',
            'password' => 'required|max:255|min:6|confirmed'
        ]);

        abort_if(
            User::where('email', $attributes['email'])->first(),
            \Illuminate\Http\Response::HTTP_BAD_REQUEST,
            'email已經註冊'
        );
        $user = User::create(
            array_merge(
               $attributes,  ['password' => Hash::make($attributes['password'])]
            ));

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
