<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kuin Orders
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mt-4">Bestellingen</h3>
                    @if(!empty($orders) && count($orders) > 0)
                        @foreach($orders as $order)
                            <div class="border p-4 mb-4 flex justify-between items-start">
                                <div>
                                    <p>Order ID: {{ $order['id'] }}</p>
                                    <p>Datum: {{ $order['created_at'] }}</p>
                                    <div id="extra-info-{{ $order['id'] }}" class="extra-info mt-2" style="display: none;"></div>
                                </div>
                                <button class="btn btn-primary btn-view-info" data-order-id="{{ $order['id'] }}">Bekijk Extra Info</button>
                            </div>
                        @endforeach
                    @else
                        <p>Geen bestellingen gevonden.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .btn-view-info {
        padding: 0.5rem 1rem;
        background-color: #4a90e2;
        color: white;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
    }

    .btn-view-info.active {
        background-color: #f39c12; /* Orange color */
    }

    .extra-info img {
        max-width: 150px;
        display: block;
    }
</style>

<script>
    const token = '89|4TGPXHyRpZcwiZIslLhJCdjGmFxOGipFgPHPYJd9';
    let products = {};

    // Fetch product data and store it in a variable
    fetch('https://kuin.summaict.nl/api/product', {
        headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        products = data.reduce((acc, product) => {
            acc[product.id] = product;
            return acc;
        }, {});
    })
    .catch(error => {
        console.error('Error fetching product data:', error);
    });

    // Add event listener to all buttons with class btn-view-info
    document.querySelectorAll('.btn-view-info').forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-order-id');
            const apiUrl = `https://kuin.summaict.nl/api/orderItem?order_id=${orderId}`;
            const extraInfoElement = document.getElementById(`extra-info-${orderId}`);

            // Toggle display of extra information
            if (extraInfoElement.style.display === 'none' || extraInfoElement.style.display === '') {
                // Fetch and display extra information if not already visible
                fetch(apiUrl, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const product = products[data[0].product_id];
                    if (product) {
                        const totalPrice = (product.price * data[0].quantity).toFixed(2);
                        extraInfoElement.innerHTML = `
                            <br>
                            <img src="${product.image}" alt="${product.name}">
                            <p>Product Naam: ${product.name}</p>
                            <p>Hoeveelheid: ${data[0].quantity}</p>
                            <p>Totaalprijs: &euro;${totalPrice}</p>
                        `;
                    } else {
                        extraInfoElement.innerHTML = `
                            <p>Product information not found</p>
                        `;
                    }
                    extraInfoElement.style.display = 'block';
                    button.textContent = 'Verberg Extra Info';
                    button.classList.add('active'); // Change button color to orange
                })
                .catch(error => {
                    console.error('Error fetching order data:', error);
                });
            } else {
                // Hide the extra information if it is already visible
                extraInfoElement.style.display = 'none';
                button.textContent = 'Bekijk Extra Info';
                button.classList.remove('active'); // Change button color back to blue
            }
        });
    });
</script>
