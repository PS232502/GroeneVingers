<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe Plant Toevoegen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('plants.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Naam</label>
                            <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" value="{{ old('name') }}" required autofocus />
                        </div>

                        <div>
                            <label for="description" class="block font-medium text-sm text-gray-700">Beschrijving</label>
                            <input id="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description" value="{{ old('description') }}" />
                        </div>

                        <div>
                            <label for="price" class="block font-medium text-sm text-gray-700">Prijs</label>
                            <input id="price" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" step="0.01" name="price" value="{{ old('price') }}" required />
                        </div>

                        <div>
                            <label for="deliverytime" class="block font-medium text-sm text-gray-700">Levertijd</label>
                            <input id="deliverytime" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="deliverytime" value="{{ old('deliverytime') }}" required />
                        </div>

                        <div>
                            <label for="light" class="block font-medium text-sm text-gray-700">Licht</label>
                            <input id="light" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="light" value="{{ old('light') }}" />
                        </div>

                        <div>
                            <label for="water" class="block font-medium text-sm text-gray-700">Water</label>
                            <input id="water" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="water" value="{{ old('water') }}" />
                        </div>

                        <div>
                            <label for="weight" class="block font-medium text-sm text-gray-700">Gewicht</label>
                            <input id="weight" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" step="0.01" name="weight" value="{{ old('weight') }}" />
                        </div>

                        <div>
                            <label for="height" class="block font-medium text-sm text-gray-700">Hoogte</label>
                            <input id="height" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" step="0.01" name="height" value="{{ old('height') }}" />
                        </div>

                        <div>
                            <label for="width" class="block font-medium text-sm text-gray-700">Breedte</label>
                            <input id="width" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" step="0.01" name="width" value="{{ old('width') }}" />
                        </div>

                        <div>
                            <label for="amount" class="block font-medium text-sm text-gray-700">Hoeveelheid</label>
                            <input id="amount" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="amount" value="{{ old('amount') }}" required />
                        </div>

                        <div>
                            <label for="image" class="block font-medium text-sm text-gray-700">Afbeelding URL</label>
                            <input id="image" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="image" value="{{ old('image') }}" />
                        </div>

                        <div>
                            <label for="color" class="block font-medium text-sm text-gray-700">Kleur</label>
                            <input id="color" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="color" value="{{ old('color') }}" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Toevoegen
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
