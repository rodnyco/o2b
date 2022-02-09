<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Новый аукцион') }}
        </h2>
    </x-slot>

    <div class="w-full p-6 flex flex-col justify-center items-center">
        <div class="w-full">
            @csrf
            <auction-create-form create-route="{{ route('purchaser.auctions.create')  }}">

            </auction-create-form>
        </div>
    </div>
</x-app-layout>

<script src="{{ asset('js/auctionCreate.js') }}" defer></script>
