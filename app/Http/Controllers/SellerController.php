<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function loginForm()
    {
        return view('seller.login');
    }

    public function login(Request $request)
    {
        $check = $request->all();
        if(Auth::guard('seller')->attempt([
                'email' => $check['email'],
                'password' => $check['password']
        ])) {
            // TODO: fix this hack
            Auth::guard('purchaser')->logout();
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

    public function productsPage()
    {
        // $products = Auth::guard('seller')->user()->products;

        $products = DB::table('seller_product')
                ->where('seller_id', '=', Auth::guard('seller')->user()->id)
                ->join('products', 'seller_product.product_id', '=', 'products.id')
                ->select('seller_product.*', 'products.*')
                ->get();

//        dd($rq);
//        die();

        return view('seller.products', compact('products'));
    }
}
