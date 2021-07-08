<?php

namespace App\Http\Controllers;

use Auth;
Use App\Model\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function loginLogic(Request $request)
    {
        // dd(Auth::attempt($request->only('username', 'password')));
        if(Auth::attempt($request->only('username', 'password'))) {
            return redirect()->intended('/dashboard');
        }

        return redirect('/login')->with('alert','Password atau Username, Salah!');
    }

    public function registerLogic(Request $request)
    {
        $user = User::create(
            [
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'jabatan' => 'pelamar',
            ]
            );

        Auth::loginUsingId($user->id_user);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        // dd(Auth::check());
        return redirect()->route('login');
    }
}
