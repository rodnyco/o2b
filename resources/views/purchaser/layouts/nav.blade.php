<!-- Navigation Links -->
<div class="bg-slate-100 flex rounded mt-1 mb-1 drop-shadow-lg">
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('purchaser.dashboard')" :active="request()->routeIs('seller.dashboard')">
            {{ __('Моя доска') }}
        </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex sm:mr-10">
        <x-nav-link :href="route('purchaser.auctions')" :active="request()->routeIs('purchaser.auctions')">
            {{ __('Мои аукционы') }}
        </x-nav-link>
    </div>
</div>
