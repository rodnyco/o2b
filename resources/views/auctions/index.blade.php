<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Аукционы') }}
        </h2>
    </x-slot>
    <div>
        <auction-list></auction-list>
    </div>
</x-app-layout>

<script src="{{ asset('js/auctionList.js') }}" defer></script>
