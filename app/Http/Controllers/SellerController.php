<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function login()
    {
        return view('seller.login');
    }

    public function dashboard()
    {
        return view('seller.index');
    }
}
