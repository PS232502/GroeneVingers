<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groene Vingers - Product Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .product-details {
            max-width: 600px;
            margin-top: 20px;
        }

        .product-details p {
            margin-bottom: 10px;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body class="min-h-screen flex flex-col">

    @include('Include/Header')

    <main class="flex-grow">
        <div class="container mx-auto mt-8 p-8">
            <div class="flex items-center">
                <img src="{{ $product->image }}" alt="Plant Image" class="product-image mr-8">
                <div class="product-details">
                    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-lg font-bold text-gray-800 mb-2">€{{ $product->price }}</p>
                    <p class="text-gray-700">{{ $product->description }}</p>
                    <ul class="mt-4">
                        <li><strong>Levertijd:</strong> {{ $product->deliverytime }} dagen</li>
                        <li><strong>Licht:</strong> {{ $product->light }}</li>
                        <li><strong>Water:</strong> {{ $product->water }}</li>
                        <li><strong>Gewicht:</strong> {{ $product->weight }} gram</li>
                        <li><strong>Hoogte:</strong> {{ $product->height }} cm</li>
                        <li><strong>Breedte:</strong> {{ $product->width }} cm</li>
                        <li><strong>Kleur:</strong> {{ $product->color }}</li>
                        <li><strong>Voorraad:</strong> {{ $product->amount }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    @include('Include/Footer')

</body>

</html>
