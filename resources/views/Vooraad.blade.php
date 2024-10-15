<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Voorraad Groene Vingers
            </h2>
            <button onclick="window.location.href='{{ route('plants.create') }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Nieuwe Plant Toevoegen
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Producten Groene Vingers</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                        @foreach ($products as $product)
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full mb-4">
                                <h4 class="text-lg font-bold">{{ $product->name }}</h4>
                                <p>Prijs: €{{ $product->price }}</p>
                                <p>Hoeveelheid: {{ $product->amount }}</p>

                                <!-- Update Button -->
                                <a href="{{ route('plants.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center mt-4 w-full">
                                    Bewerken
                                </a>

                                <!-- Delete Button -->
                                <form method="POST" action="{{ route('plants.destroy', $product->id) }}" onsubmit="return confirm('Weet u zeker dat u dit wilt verwijderen?')" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">
                                        Verwijderen
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
