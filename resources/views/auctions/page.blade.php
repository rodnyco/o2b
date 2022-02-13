<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Аукцион №'.$auction->id) }}
        </h2>
    </x-slot>
    <div>
        <div class="flex flex-col mb-8">
            <div class="mb-6 flex container columns-3">
                <img src="{{ $imgPlaceHolder }}" class="w-1/6" alt="">
                <div class="flex flex-col pl-6 w-4/6">
                    <h3 class="text-3xl">{{ $auction->title }}</h3>
                    <div>Товар: <span class="font-bold">{{ $product->title }}</span></div>
                    <div>Количество: <span class="font-bold">{{ $auction->count . ' ' . $auction->product_unit }}</span></div>
                    <div>Лидирующая ставка: <span class="font-bold">40.000 ₽</span></div>
                </div>
                <div class="flex flex-col pl-6 w-1/6 items-center">
                    @if($auction->status == 'opened')
                        <div class="flex justify-center">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative">Открыт</span>
                                </span>
                        </div>
                    @else
                        <div class="flex justify-center">
                                <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
									<span class="relative">Закрыт</span>
								</span>
                        </div>
                    @endif
                    <div class="pt-2">
                        <p class="font-bold">Ставок: 21</p>
                    </div>
                </div>

            </div>
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
                <h2 class="font-bold text-xl mb-4">Добавить новую ставку</h2>
                @csrf
                <new-bet-form auction-id="{{ $auction->id }}" seller-id="{{ Auth::guard('seller')->user()->id }}" seller-name="{{ Auth::guard('seller')->user()->name }}" create-route="{{ route('bet.create')  }}" placeholder="{{ $imgPlaceHolder }}">

                </new-bet-form>
            @endauth
            <div class="divide-y-4 divide-slate-400/25">
                @foreach($auction->bets as $bet)
                    <div class="rounded-md drop-shadow-xl border border-cyan-500 mb-8">
                        <div class="p-3 font-bold bg-cyan-500 rounded-md text-white">
                            <h3>Ставка № {{ $bet->id }} </h3>
                            <div class="text-3xl">{{ number_format($bet->price, 2)  }} ₽</div>
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
