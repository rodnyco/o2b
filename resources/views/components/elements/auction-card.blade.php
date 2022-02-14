<div class="mb-6 flex container columns-3">
    <img src="{{ $image }}" class="w-1/6" alt="">
    <div class="flex flex-col pl-6 w-4/6">
        <h3 class="text-3xl">{{ $auctionTitle }}</h3>
        <div>Товар: <span class="font-bold">{{ $productTitle }}</span></div>
        <div>Количество: <span class="font-bold">{{ $productCount }}</span></div>
        <div>Лидирующая ставка:
            <span class="font-bold">{{  $betLeader }} ₽</span>
        </div>
    </div>
    <div class="flex flex-col pl-6 w-1/6 items-center">
        @if($auctionStatus == 'opened')
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
            <p class="font-bold">Ставок: {{  $betsCount  }}</p>
        </div>
    </div>
</div>
