<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function loginForm()
    {
        return view('seller.login');
    }

    public function login(Request $request) {
        $check = $request->all();
        if(Auth::guard('seller')->attempt([
                'email' => $check['email'],
                'password' => $check['password']
        ])) {
            return redirect()->route('seller.dashboard');
        } else {
            return back()->with('error', 'Неправильный логин или пароль');
        }
    }

    public function dashboard()
    {
        return view('seller.index');
    }

    public function logout()
    {
        Auth::guard('seller')->logout();

        return redirect()->route('login_form')->with('error', 'Вы вышли из аккаунта');
    }
}
