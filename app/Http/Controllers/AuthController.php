<?php

namespace App\Http\Controllers;

use App\Providers\UserCreator;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignin()
    {
        return view('auth.signin');
    }

    public function signin(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors([
                'message' => 'Email e/ou senha incorretos. Tente novamente!',
            ]);
        }

        return redirect()->route('home');
    }

    public function showSignup()
    {
        return view('auth.signup');
    }

    public function signup(Request $request, UserCreator $userCreator)
    {
        $data = $request->except('_token');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'zip_code' => 'required|string|max:8',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:5',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:3|min:1',
            'complement' => 'required|string|max:255',
            'gender' => 'required|string',
            'phone' => 'required|string|regex:/[0-2][0-9]{9}/'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $userCreator->create($data);

            return redirect()->route('home');
        }
    }
}
