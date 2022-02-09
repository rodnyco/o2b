<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Аукционы') }}
        </h2>
    </x-slot>
    <div>
        @foreach ($auctions as $auction)
            <div class="rounded-md mt-6 p-6 bg-slate-100 hover:bg-blue-200 drop-shadow-lg cursor-pointer">
                <div class="flex container columns-3">
                    <img src="{{ $imgPlaceHolder }}" class="w-1/6" alt="">
                    <div class="flex flex-col pl-6 w-4/6">
                        <h3 class="text-3xl">{{ $auction->title }}</h3>
                        <div>Товар: <span class="font-bold">{{ $auction->product_title }}</span></div>
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
            </div>
        @endforeach
    </div>
</x-app-layout>
