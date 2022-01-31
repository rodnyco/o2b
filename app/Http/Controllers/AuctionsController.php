<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionsController extends Controller
{
    public function createForm()
    {
        return view('purchaser.auctions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'count' => ['required'],
            'unit' => ['required', 'string'],
        ]);
//        echo Auth::guard('purchaser')->user()->id;
//        die();
        Auction::create([
            'product_id' => $request->product_id,
            'count' => $request->count,
            'description' => $request->description,
            'purchaser_id' => Auth::guard('purchaser')->user()->id,
        ]);

        return redirect(route('purchaser.auctions'));
    }
}
