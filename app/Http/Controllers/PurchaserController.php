<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaserController extends Controller
{
    public function loginForm()
    {
        return view('purchaser.login');
    }

    public function login(Request $request)
    {
        $check = $request->all();

        if(Auth::guard('purchaser')->attempt([
            'email' => $check['email'],
            'password' => $check['password']
        ])) {
            // TODO: fix this hack
            Auth::guard('seller')->logout();
            return redirect()->route('purchaser.dashboard');
        } else {
            return back()->with('error', 'Неправильный логин или пароль');
        }
    }

    public function logout()
    {
        Auth::guard('purchaser')->logout();

        return redirect()->route('purchaser.login_form')->with('error', 'Вы вышли из аккаунта');
    }

    public function dashboard()
    {
        return view('purchaser.index');
    }

    public function auctionsPage()
    {
        return view('purchaser.auctions.index');
    }
}
