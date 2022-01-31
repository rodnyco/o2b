<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionsController extends Controller
{
    public function createForm()
    {
        return view('purchaser.auctions.create');
    }

    public function store(Request $request)
    {
        return redirect(route('purchaser.auctions'));
    }
}
