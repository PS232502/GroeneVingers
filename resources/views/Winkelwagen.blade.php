<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Winkelwagen
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Winkelwagen</h3>
                    @if(count($products) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
                        @php $totalCartPrice = 0; @endphp
                        @foreach($products as $product)
                        <div class="border p-4 rounded-lg shadow-md mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-lg font-semibold">{{ $product['name'] }}</h4>
                                <div class="flex items-center">
                                    <!-- Hoeveelheid -->
                                    <input type="number" min="1" value="{{ $product['quantity'] }}" class="border-gray-300 border w-16 text-center mr-2" onchange="updateQuantity({{ $product['id'] }}, this.value)">
                                    <!-- Delete button (Alleen zichtbaar als hoeveelheid > 0 is) -->
                                    @if($product['quantity'] > 0)
                                    <button class="text-gray-500 hover:text-gray-700" onclick="removeFromCart({{ $product['id'] }})">
                                        <x-gmdi-delete class="w-5 h-5 text-red-500" />
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <p class="text-gray-600">Prijs: €{{ $product['price'] ?? 'N/A' }}</p>
                            <!-- Totaalbedrag -->
                            <p class="text-right text-gray-600">Totaal: €{{ number_format(($product['price'] ?? 0) * $product['quantity'], 2, ',', '.') }}</p>

                        </div>
                        @php $totalCartPrice += ($product['price'] ?? 0) * $product['quantity']; @endphp
                        @endforeach
                    </div>
                    <!-- Totaal prijs van alles in de winkelwagen -->
                    <div class="text-right mt-4">
                        <p class="text-lg font-semibold">Nog te betalen: €{{ number_format($totalCartPrice, 2, ',', '.') }}</p>
                    </div>
                    <!-- Bestel knop -->
                    <form method="POST" action="{{ route('cart.order') }}" class="text-right mt-4">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Bestelling plaatsen</button>
                    </form>
                    @else
                    <p class="text-gray-600">Winkelwagen is leeg.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    function removeFromCart(productId) {
        fetch(`/cart/remove/${productId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload(); // Herlaad de pagina na een succesvolle update
                } else {
                    throw new Error('Het verwijderen van het product is niet gelukt');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function updateQuantity(productId, quantity) {
        if (quantity < 1) {
            quantity = 1; // Hoeveelheid kan niet minder zijn dan 1
        }
        fetch(`/cart/update/${productId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    quantity: quantity
                })
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload(); // Herlaad de pagina na een succesvolle update
                } else {
                    throw new Error('Het aanpassen van de product hoeveelheid is niet gelukt');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>