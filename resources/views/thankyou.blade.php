<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bedankt voor uw bestelling
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Bedankt voor uw bestelling!</h3>
                    <a href="{{ route('orders.view') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Bekijk bestellingen
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
