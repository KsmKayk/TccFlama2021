<?php

namespace App\Http\Controllers;

use App\Providers\UserCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignin()
    {
        return view('dev.auth.signin');
    }

    public function signin(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors([
                'message' => 'Email e/ou senha incorretos. Tente novamente!',
            ]);
        }

        return redirect()->route('home_protected');
    }

    public function showSignup()
    {
        return view('dev.auth.signup');
    }

    public function signup(Request $request, UserCreator $userCreator)
    {
        $data = $request->except('_token');
        $userCreator->create($data);

        return redirect()->route('home_protected');
    }
}
