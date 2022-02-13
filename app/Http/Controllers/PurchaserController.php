<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $auctions = DB::table('auctions')
            ->where('purchaser_id', '=', Auth::guard('purchaser')->user()->id)
            ->join('products', 'auctions.product_id', '=', 'products.id')
            ->leftJoin('bets', 'auctions.id', '=', 'bets.auction_id')
            ->select(
                'auctions.*',
                'products.title as product_title',
                'products.unit as product_unit',
                DB::raw("count(bets.id) as bets_count")
            )
            ->groupBy('auctions.id')
            ->orderByDesc('created_at')
            ->get();

        return view('purchaser.auctions.index', compact('auctions'));
    }
}
