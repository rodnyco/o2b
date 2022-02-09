<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Мои товары') }}
        </h2>
    </x-slot>

    <div>
        <a href="{{ route('seller.products.createForm') }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Создать новый
            </button>
        </a>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center">
                        <thead class="border-b bg-gray-800">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                ID
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Название
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Единица измерения
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Цена
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Описание
                            </th>
                        </tr>
                        </thead class="border-b">
                        <tbody>
                        @foreach ($products as $product)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $product->id }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->title }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->unit }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->product_price }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->description }}
                                </td>
                            </tr class="bg-white border-b">
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
