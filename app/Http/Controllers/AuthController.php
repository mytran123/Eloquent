<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view("backend.auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->only("email","password");
        if (Auth::attempt($data)) {
            return redirect()->route("posts.index");
        } else {
            dd("Login Fail");
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route("admin.login");
    }

    public function showFormRegister()
    {
        return view("backend.auth.register");
    }

    public function register(Request $request)
    {

    }
}
