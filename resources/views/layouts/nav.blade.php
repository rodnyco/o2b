<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('main') }}">
                        <x-application-logo-min class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('auctions')" :active="request()->routeIs('auctions')">
                        {{ __('Аукционы') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
                        {{ __('Товары') }}
                    </x-nav-link>
                    <x-nav-link :href="route('sellers')" :active="request()->routeIs('sellers')">
                        {{ __('Продавцы') }}
                    </x-nav-link>
                    @auth('seller')
                        @include('seller.layouts.nav')
                    @endauth
                    @auth('purchaser')
                        @include('purchaser.layouts.nav')
                    @endauth
                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            {{--                                <div>{{ Auth::guard('seller')->user()->name }}</div>--}}

                            @auth('seller')
                                <div>{{  Auth::guard('seller')->user()->name }}</div>
                            @endauth
                            @auth("purchaser")
                                <div>{{  Auth::guard('purchaser')->user()->name }}</div>
                            @endauth
                            @if(!Auth::guard('seller')->check() && !Auth::guard('purchaser')->check())
                                <div>Вход</div>
                            @endif
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        @if(!Auth::guard('seller')->check() && !Auth::guard('purchaser')->check())
                            <x-dropdown-link :href="route('purchaser.login_form')">
                                {{ __('Войти как покупатель') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('login_form')">
                                {{ __('Войти как продавец') }}
                            </x-dropdown-link>
                        @endif

                        @auth('seller')
                            <x-dropdown-link :href="route('seller.dashboard')">
                                {{ __('Личный кабинет') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('seller.dashboard')">
                                {{ __('Настройки') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('seller.logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('seller.logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Выход') }}
                                </x-dropdown-link>
                            </form>
                        @endauth

                        @auth('purchaser')
                            <x-dropdown-link :href="route('purchaser.dashboard')">
                                {{ __('Личный кабинет') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('purchaser.dashboard')">
                                {{ __('Настройки') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('purchaser.logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('purchaser.logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Выход') }}
                                </x-dropdown-link>
                            </form>
                        @endauth
                    </x-slot>

                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
