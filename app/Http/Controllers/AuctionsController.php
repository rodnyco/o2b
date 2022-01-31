<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;

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

        Auction::create([
            'product_id' => $request->product_id,
            'count' => $request->count,
            'description' => $request->description,
        ]);

        return redirect(route('purchaser.auctions'));
    }
}
