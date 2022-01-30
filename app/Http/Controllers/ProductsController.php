<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function createForm(Request $request)
    {
        return view('seller.products.create');
    }

    public function store(Request $request)
    {
        //dd();
    }
}
