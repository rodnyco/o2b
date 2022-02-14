<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Аукционы') }}
        </h2>
    </x-slot>
    <div>
        @foreach ($auctions as $auction)
            <a href="{{  route('auction.page', [$auction->id])  }}">
                <div class="rounded-md mt-6 p-6 bg-slate-100 hover:bg-blue-200 drop-shadow-lg cursor-pointer">
                    @php
                        $leaderPrice = 0;
                        if($auction->leader()->exists()) {
                            $leaderPrice = $auction->leader->bet->price;
                        }
                    @endphp
                    <x-elements.auction-card
                        image="{{ $imgPlaceHolder }}"
                        auctionTitle="{{ $auction->title }}"
                        auctionStatus="{{ $auction->status }}"
                        betsCount="{{  $auction->bets()->count()  }}"
                        betLeader="{{  $leaderPrice  }}"
                        productTitle="{{ $auction->product->title }}"
                        productCount="{{ $auction->count . ' ' . $auction->product->product_unit }}"
                    ></x-elements.auction-card>
            </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
