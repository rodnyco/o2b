<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class AuctionsController extends Controller
{
    public function createForm(): Factory | View | Application
    {
        return view('purchaser.auctions.create');
    }

    public function store(Request $request): Redirector | Application | RedirectResponse
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
            'purchaser_id' => Auth::guard('purchaser')->user()->id,
        ]);

        return redirect(route('purchaser.auctions'));
    }

    public function index(Request $request): Factory | View | Application
    {
        $auctions = DB::table('auctions')
            ->join('products', 'auctions.product_id', '=', 'products.id')
            ->leftJoin('bets', 'auctions.id', '=', 'bets.auction_id')
            ->select(
                'auctions.*',
                'products.title as product_title',
                'products.unit as product_unit',
                DB::raw("count(bets.id) as bets_count")
            )
            ->orderByDesc('created_at')
            ->groupBy('auctions.id')
            ->get();

        $imgPlaceHolder = asset('storage/placeholders/auction-image.png');

        return view('auctions.index', compact(['auctions', 'imgPlaceHolder']));
    }

    public function auctionPage(Request $request, Auction $auction)
    {
        $product = Product::find($auction->product_id);
        $imgPlaceHolder = asset('storage/placeholders/auction-image.png');

        return view('auctions.page', compact(['auction', 'product', 'imgPlaceHolder']));
    }

}
