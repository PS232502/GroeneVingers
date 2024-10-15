<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Plant Bewerken
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Update Form -->
                    <form method="POST" action="{{ route('plants.update', $plant->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                            <input type="text" name="name" id="name" value="{{ $plant->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                            <input type="text" name="description" id="description" value="{{ $plant->description }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Prijs</label>
                            <input type="number" name="price" id="price" value="{{ $plant->price }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="deliverytime" class="block text-sm font-medium text-gray-700">Levertijd</label>
                            <input type="number" name="deliverytime" id="deliverytime" value="{{ $plant->deliverytime }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="light" class="block text-sm font-medium text-gray-700">Licht</label>
                            <input type="text" name="light" id="light" value="{{ $plant->light }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="water" class="block text-sm font-medium text-gray-700">Water</label>
                            <input type="text" name="water" id="water" value="{{ $plant->water }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="weight" class="block text-sm font-medium text-gray-700">Gewicht</label>
                            <input type="number" name="weight" id="weight" value="{{ $plant->weight }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="height" class="block text-sm font-medium text-gray-700">Hoogte</label>
                            <input type="number" name="height" id="height" value="{{ $plant->height }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="width" class="block text-sm font-medium text-gray-700">Breedte</label>
                            <input type="number" name="width" id="width" value="{{ $plant->width }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="amount" class="block text-sm font-medium text-gray-700">Hoeveelheid</label>
                            <input type="number" name="amount" id="amount" value="{{ $plant->amount }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Afbeelding URL</label>
                            <input type="text" name="image" id="image" value="{{ $plant->image }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium text-gray-700">Kleur</label>
                            <input type="text" name="color" id="color" value="{{ $plant->color }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Bijwerken
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>