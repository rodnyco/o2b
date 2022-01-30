<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Новый аукцион') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full p-6 flex flex-col justify-center items-center">

                    <form method="POST" action="{{ route('seller.products.create') }}" class="w-full px-8 pt-6 pb-8 mb-4">
                        <div class="w-full mb-4">
                            <x-errors :errors="$errors" />
                        </div>
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Название
                            </label>
                            <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Название аукциона">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Создать
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

