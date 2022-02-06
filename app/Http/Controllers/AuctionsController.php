<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AuctionsController extends Controller
{
    public function createForm(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('purchaser.auctions.create');
    }

    public function store(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
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

    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $auctions = DB::table('auctions')
            ->join('products', 'auctions.product_id', '=', 'products.id')
            ->select('auctions.*', 'products.title as product_title', 'products.unit as product_unit')
            ->orderByDesc('created_at')
            ->get();

        $imgPlaceHolder = asset('storage/placeholders/auction-image.png');

        return view('auctions.index', compact(['auctions', 'imgPlaceHolder']));
    }

}
