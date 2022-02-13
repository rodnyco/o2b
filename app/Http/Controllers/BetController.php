<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'auction_id' => ['required'],
            'price' => ['required'],
            'description' => ['required', 'string'],
        ]);

        Bet::create([
            'auction_id' => $request->auction_id,
            'price' => $request->price,
            'seller_id' => Auth::guard('seller')->user()->id,
            'description' => $request->description,
        ]);

        return redirect(route('auction.page', ['auction' => Auction::find($request->auction_id)]));
    }
}
