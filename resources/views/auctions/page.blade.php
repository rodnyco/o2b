<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Аукцион №'.$auction->id) }}
        </h2>
    </x-slot>
    <div>
        <div class="flex flex-col mb-8">
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
                productTitle="{{ $product->title }}"
                productCount="{{ $auction->count . ' ' . $auction->product_unit }}"
            ></x-elements.auction-card>
            <div>
                <span class="font-bold">Требования:</span>
                <p>
                    {{ $auction->description }}
                </p>
            </div>
        </div>

        <div class="divide-y">
            <div></div>
        </div>
        <div>
            @auth('seller')
                @csrf
                <new-bet-form auction-id="{{ $auction->id }}" seller-id="{{ Auth::guard('seller')->user()->id }}" seller-name="{{ Auth::guard('seller')->user()->name }}" create-route="{{ route('bet.create')  }}" placeholder="{{ $imgPlaceHolder }}">

                </new-bet-form>
            @endauth
            <div class="divide-y-4 divide-slate-400/25">
                    @foreach($auction->bets as $bet)
                        @php
                            $color = "cyan-500";
                            if($auction->leader()->exists() && $bet->id == $auction->leader->bet->id) {
                                $color = "amber-300";
                            }
                        @endphp
                        <div class="rounded-md drop-shadow-xl border border-{{$color}} mb-8">
                                <div class="p-3 font-bold bg-{{$color}} rounded-md text-white flex">
                                    <div class="w-5/6">
                                        <h3>Ставка № {{ $bet->id }} </h3>
                                        <div class="text-3xl">{{ number_format($bet->price, 2)  }} ₽</div>
                                    </div>
                                    @if($isOwner)
                                        <button class="w-1/6 bg-transparent hover:bg-white text-white  font-semibold hover:text-cyan-500 py-2 px-4 border border-white hover:border-transparent rounded">
                                            Сделать лидером
                                        </button>
                                    @endif
                                </div>

                            <div class="p-3 flex">
                                <img src="{{ $imgPlaceHolder }}" class="w-1/3" alt="">
                                <div class="w-2/3 m-3">
                                    <div>
                                        <dvi>
                                            Продавец: <span class="font-bold">{{ $bet->seller->name }}</span>
                                        </dvi>
                                        <div>
                                            Дата: <span class="font-bold">{{ $bet->created_at }}</span>
                                        </div>
                                    </div>
                                    <div >
                                        <span class="font-bold"> Описание: </span>
                                        <div class="max-h-36 overflow-auto">
                                            {{ $bet->description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

@auth('seller')
    <script src="{{ asset('js/auctionBet.js') }}" defer></script>
@endauth
