<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function createForm(Request $request)
    {
        return view('seller.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'unit' => ['required', 'string'],
        ]);

        $product = Product::create([
            'title' => $request->title,
            'unit'  => $request->unit,
            'description' => $request->description
        ]);

        if($product->id) {
            DB::table('seller_product')->insert([
                'seller_id' => Auth::guard('seller')->user()->id,
                'product_id' => $product->id,
                'product_price' => $request->price
            ]);
        }

        return redirect(route('seller.productsPage'));
    }

    public function search(Request $request)
    {
        $posts = Product::where('title', 'like', '%'.$request->keywords.'%')->get();

        return response()->json($posts);
    }
}
