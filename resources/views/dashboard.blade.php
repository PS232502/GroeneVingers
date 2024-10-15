<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Inkoop Kuin
            </h2>
            <a href="{{ route('winkelwagen') }}">
                <x-bi-cart class="w-6 h-6" />
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Producten</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                        @foreach($products as $product)
                        <div class="border p-2 relative">
                            <div class="mb-2">
                                <h4 class="text-lg font-semibold">{{ $product['name'] }}</h4>
                                <p class="text-gray-700">€{{ $product['price'] }}</p>
                            </div>
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full cursor-pointer" onclick="toggleExtraInfo(this)">
                            <div class="extra-info hidden absolute inset-0 bg-white bg-opacity-75 p-2">
                                <p>{{ $product['description'] }}</p>
                                <p class="mb-4"></p>
                                <p>Kleur: {{ $product['color'] }}</p>
                                <p>Hoogte: {{ $product['height_cm'] }} cm</p>
                                <p>Breedte: {{ $product['width_cm'] }} cm</p>
                                <p>Diepte: {{ $product['depth_cm'] }} cm</p>
                                <p>Gewicht: {{ $product['weight_gr'] }} g</p>
                            </div>
                            <form class="add-to-cart mt-2">
                                <input type="number" name="quantity" id="quantity-{{ $product['id'] }}" min="1" value="1" class="border p-1 w-full mb-2">
                                <div class="flex">
                                    <button type="button" class="bg-red-500 text-white p-1 w-1/2 mr-1" onclick="deleteFromCart({{ $product['id'] }})">Verwijderen</button>
                                    <button type="button" class="bg-blue-500 text-white p-1 w-1/2 ml-1" onclick="addToCart({{ $product['id'] }}, document.getElementById('quantity-{{ $product['id'] }}').value)">Toevoegen</button>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var lastClickedImage = null;

        function toggleExtraInfo(image) {
            var extraInfo = image.nextElementSibling;

            if (extraInfo.classList.contains("hidden")) {
                hideExtraInfo();
                // Laat extra info zien als je op de foto klikt
                extraInfo.classList.remove("hidden");
                lastClickedImage = image;
            } else if (lastClickedImage === image) {
                hideExtraInfo();
                lastClickedImage = null;
            } else {
                // Verberg extra info als deze al zichtbaar is voor een ander product
                hideExtraInfo();
                // Laat extra info zien
                extraInfo.classList.remove("hidden");
                lastClickedImage = image;
            }
        }

        function hideExtraInfo() {
            if (lastClickedImage !== null) {
                var lastExtraInfo = lastClickedImage.nextElementSibling;
                lastExtraInfo.classList.add("hidden");
            }
        }

        function addToCart(productId, quantity) {
            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: parseInt(quantity)
                })
                
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);

                // alert('Product toegevoegd aan winkelwagen!');
            })
            .catch((error) => {
                console.error('Error:', error);
                // alert('Product toevoegen aan winkelwagen mislukt.');
            });
        }

        function deleteFromCart(productId) {
            fetch('{{ url('/cart/remove') }}/' + productId, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // alert('Product verwijderd uit winkelwagen!');
            })
            .catch((error) => {
                console.error('Error:', error);
                // alert('Product verwijderen uit winkelwagen mislukt.');
            });
        }
    </script>
</x-app-layout>
