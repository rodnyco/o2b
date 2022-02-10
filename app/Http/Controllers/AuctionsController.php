<?php

namespace App\Http\Controllers;

use App\Models\Auction;
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
            ->select('auctions.*', 'products.title as product_title', 'products.unit as product_unit')
            ->orderByDesc('created_at')
            ->get();

        $imgPlaceHolder = asset('storage/placeholders/auction-image.png');

        return view('auctions.index', compact(['auctions', 'imgPlaceHolder']));
    }

    public function auctionPage(Request $request, $id)
    {
        return view('auctions.page');
    }

}
