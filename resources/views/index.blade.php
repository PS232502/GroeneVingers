<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groene Vingers</title>

    @vite('resources/css/app.css')

</head>

<body class="min-h-screen flex flex-col">

    @include('Include/Header')

    <main class="flex-grow p-6">
        <h1 class="text-lg text-center mb-4">Binnenkort een nieuwe website met webshop!</h1>

        <h1 class="text-2xl text-center mb-10 mt-24 font-bold">PRODUCTEN</h1>

        <div class="flex justify-end">
            <form action="{{ route('filterByPrice') }}" method="GET" class="flex items-center space-x-4">
                <label for="min_price" class="font-bold">Min Price:</label>
                <input type="text" name="min_price" id="min_price" value="{{ old('min_price') }}" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">

                <label for="max_price" class="font-bold">Max Price:</label>
                <input type="text" name="max_price" id="max_price" value="{{ old('max_price') }}" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Filter</button>
            </form>
        </div>

        <div class="flex flex-wrap justify-center mb-6" id="productContainer">
            @foreach ($products->take(5) as $product)
            <div class="w-1/3 p-2 product">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <a href="product/" ${product.id}>
                    <img src="{{ $product->image }}" alt="Plant Image" class="w-full mb-2 rounded-lg object-cover" style="margin: 0 auto;" onclick="console.log('Form submitted!');">
                </a>
                <p>{{ $product->name }}</p>
                <p>€{{ $product->price }}</p>
            </div>
            @endforeach
        </div>

        <div class="flex justify-center w-full mt-4" id="buttonContainer">
            @if ($products->count() > 5)
            <button id="loadLessBtn" class="bg-orange-600 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded mr-2" style="display: none;">
                Vorige
            </button>
            <button id="loadMoreBtn" class="bg-orange-600 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded ml-2">
                Volgende
            </button>
            @endif
        </div>
        <div id="extraInfoContainer" class="mt-4"></div>

        <h1 class="text-2xl text-center mb-10 mt-10 font-bold">LOCATIES</h1>
        <div class="flex justify-center space-x-4 mb-6">
            <div class="w-1/3 h-60">
                <img src="{{ asset('IMG/Veldhoven.jpg') }}" alt="Image 1" class="w-full h-full rounded-lg mb-2 object-cover">
                <p class="text-center">Sondervick 19, 5505 NA Veldhoven</p>
            </div>

            <div class="w-1/3 h-60">
                <img src="{{ asset('IMG/Best.jpg') }}" alt="Image 2" class="w-full h-full rounded-lg mb-2 object-cover">
                <p class="text-center">Aarleseweg 50, 5684 LN Best</p>
            </div>

            <div class="w-1/3 h-60">
                <img src="{{ asset('IMG/Nuenen.jpg') }}" alt="Image 3" class="w-full h-full rounded-lg mb-2 object-cover">
                <p class="text-center">Kapperdoesweg 8, 5674 AJ Nuenen</p>
            </div>
        </div>

    </main>
    @include('Include/Footer')

</body>

</html>

<script>
    // Wacht tot de DOM is geladen voordat de Javascript word uitgevoerd
    document.addEventListener('DOMContentLoaded', function() {
        const productContainer = document.getElementById('productContainer');
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        const loadLessBtn = document.getElementById('loadLessBtn');
        const buttonContainer = document.getElementById('buttonContainer');
        const extraInfoContainer = document.getElementById('extraInfoContainer');


        // Haal de producten op
        // Foutmelding moet nog opgelost worden, maar het werkt op het moment wel
        const products = @json($products);

        // Aantal zichtbare producten
        let visibleProducts = 5;

        // Functie die de producten laat zien
        function loadProducts(startIndex) {
            // Container leegmaken voordat er nieuwe producten inkomen
            productContainer.innerHTML = '';

            // De volgende producten die worden laten zien
            const nextProducts = products.slice(startIndex, startIndex + 5);

            // Ga door elk product heen en maak een HTML element om deze te laten zien
            nextProducts.forEach(function(product) {
                const productDiv = document.createElement('div');
                productDiv.classList.add('w-1/3', 'p-2', 'product');

                // Check if product amount is less than 1 to show "Uitverkocht" in red
                const productStatus = product.amount < 1 ?
                    '<span style="color: red;">Uitverkocht</span>' :
                    `€${product.price}`;

                productDiv.innerHTML = `
            <a href="product/${product.id}">
                <img src="${product.image}" alt="Plant Image" class="w-full mb-2 rounded-lg object-cover" style="margin: 0 auto;">
                <p>${product.name}</p>
                <p>${productStatus}</p>
            </a>
        `;

                productContainer.appendChild(productDiv);

                // Voeg een klikgebeurtenis toe om extra informatie te tonen
                productDiv.addEventListener('click', function() {
                    console.log(`Geclickt ${product.name}`);
                });
            });
        }

        // Load the products when the page is loaded
        loadProducts(0);

        // Verberg de "Vorige" knop als er 5 of minder dan 5 producten zichtbaar zijn
        if (products.length <= 5) {
            loadLessBtn.style.display = 'none';
        }

        // Zorg ervoor dat de "Volgende" knop iets doet
        loadMoreBtn.addEventListener('click', function() {
            // De volgende 5 producten
            visibleProducts += 5;

            // Laad de volgende 5 producten
            loadProducts(visibleProducts - 5);

            // Laat de "Vorige" knop zien
            loadLessBtn.style.display = 'inline-block';

            // Verberg de "Volgende" knop als de laatste producten zichtbaar zijn
            if (visibleProducts >= products.length) {
                loadMoreBtn.style.display = 'none';
            }
        });

        // Zorg ervoor dat de "Vorige" knop iets doet
        loadLessBtn.addEventListener('click', function() {
            // De vorige 5 producten
            visibleProducts -= 5;

            // Verberg de "Vorige" knop als er 5 of minder dan 5 producten zichtbaar zijn
            if (visibleProducts <= 5) {
                loadLessBtn.style.display = 'none';
            }

            // Laat de "Volgende" knop zien
            loadMoreBtn.style.display = 'inline-block';

            // Laad de vorige 5 producten
            loadProducts(Math.max(visibleProducts - 5, 0));
        });
    });
</script>