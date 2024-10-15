<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Flasher\Prime\FlasherInterface;
use GuzzleHttp\Client;
use Illuminate\Console\View\Components\Alert;

use function Laravel\Prompts\alert;

class KuinController extends Controller
{



    public function readProducts()
    {
        $apiEndpoint = 'https://kuin.summaict.nl/api/product';
        $apiToken = '89|4TGPXHyRpZcwiZIslLhJCdjGmFxOGipFgPHPYJd9';

        $client = new \GuzzleHttp\Client(['verify' => false]);

        try {
            $response = $client->request('GET', $apiEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiToken,
                    'Content-Type' => 'application/json',
                ],
            ]);
            $responseBody = $response->getBody()->getContents();
            $products = json_decode($responseBody, true);
            return view('dashboard', ['products' => $products]);
        } catch (\Exception $e) {
            return view('error', ['error' => 'API request failed: ' . $e->getMessage()]);
        }
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Fetch product details from API to get the price
            $apiEndpoint = 'https://kuin.summaict.nl/api/product/' . $productId;
            $apiToken = '89|4TGPXHyRpZcwiZIslLhJCdjGmFxOGipFgPHPYJd9';
            $client = new \GuzzleHttp\Client(['verify' => false]);

            try {
                $response = $client->request('GET', $apiEndpoint, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiToken,
                        'Content-Type' => 'application/json',
                    ],
                ]);
                $responseBody = $response->getBody()->getContents();
                $product = json_decode($responseBody, true);

                $cart[$productId] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $product['price'],
                    'name' => $product['name']
                ];
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Product toevoegen mislukt!']);
            }
        }
        session()->put('cart', $cart);

        // Flash()->success('Product toegevoegd aan winkelwagen!');

        return response()->json(['success' => true, 'message' => 'Product toegevoegd aan winkelwagen!']);
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        // flash()
        //     ->options([
        //         'timeout' => 3000, // 3 seconds
        //         'position' => 'bottom-right',
        //     ])->success('Product verwijderd uit de winkelwagen!.');
        return response()->json(['success' => true, 'message' => 'Product verwijderd uit winkelwagen!']);
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $products = [];

        if (!empty($cart)) {
            $apiEndpoint = 'https://kuin.summaict.nl/api/product';
            $apiToken = '89|4TGPXHyRpZcwiZIslLhJCdjGmFxOGipFgPHPYJd9';

            $client = new \GuzzleHttp\Client(['verify' => false]);

            try {
                $response = $client->request('GET', $apiEndpoint, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiToken,
                        'Content-Type' => 'application/json',
                    ],
                ]);
                $responseBody = $response->getBody()->getContents();
                $allProducts = json_decode($responseBody, true);

                foreach ($cart as $item) {
                    foreach ($allProducts as $product) {
                        if ($product['id'] == $item['product_id']) {
                            $product['quantity'] = $item['quantity'];
                            $product['price'] = $item['price']; // Ensure price is set
                            $products[] = $product;
                            break;
                        }
                    }
                }
            } catch (\Exception $e) {
                return view('error', ['error' => 'API request failed: ' . $e->getMessage()]);
            }
        }

        return view('winkelwagen', compact('products'));
    }

    public function updateQuantity(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        foreach ($cart as &$item) {
            if ($item['product_id'] == $productId) {
                $item['quantity'] = max(1, $request->input('quantity'));
                break;
            }
        }

        session()->put('cart', $cart);
        // flash()
        //     ->options([
        //         'timeout' => 3000, // 3 seconds
        //         'position' => 'bottom-right',
        //     ])->success('Hoeveelheid succesvol gewijzigd!');
        return response()->json(['message' => 'Hoeveelheid bijgewerkt'], 200);
    }


    public function postOrderToApi(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Winkelwagen is leeg.');
        }

        $orderItems = array_map(function ($product) {
            return [
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ];
        }, $cart);

        $apiEndpoint = 'https://kuin.summaict.nl/api/orderItem';
        $apiToken = '89|4TGPXHyRpZcwiZIslLhJCdjGmFxOGipFgPHPYJd9';

        $client = new \GuzzleHttp\Client(['verify' => false]);

        try {
            foreach ($orderItems as $orderItem) {
                $response = $client->request('POST', $apiEndpoint, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiToken,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $orderItem,
                ]);
            }

            Session::forget('cart');
            // flash()
            //     ->options([
            //         'timeout' => 3000, // 3 seconds
            //         'position' => 'bottom-right',
            //     ])->success('Uw bestelling is geplaatst!');
            return redirect()->route('cart.thankyou');
        } catch (\Exception $e) {
            return redirect()->route('cart.view')->with('error', 'Uw bestelling is niet ontvangen. Probeer het later opnieuw!');
            //API-aanvraag mislukt: ' . $e->getMessage());
        }
    }




    public function viewThankYou(Request $request)
    {
        return view('thankyou');
    }


    public function viewOrders()
    {
        $apiEndpoint = 'https://kuin.summaict.nl/api/order';
        $apiToken = '89|4TGPXHyRpZcwiZIslLhJCdjGmFxOGipFgPHPYJd9';
        $client = new \GuzzleHttp\Client(['verify' => false]);

        try {
            $response = $client->request('GET', $apiEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiToken,
                    'Content-Type' => 'application/json',
                ],
            ]);

            $orders = json_decode($response->getBody(), true);

            // Ensure $orders is an array
            if (!is_array($orders)) {
                $orders = [];
            }

            // Sort orders by id in descending order
            usort($orders, function ($a, $b) {
                return $b['id'] - $a['id'];
            });

            // Format the date for each order
            foreach ($orders as &$order) {
                $order['created_at'] = Carbon::parse($order['created_at'])->format('d-m-Y');
            }

            return view('KuinOrders', ['orders' => $orders]);
        } catch (\Exception $e) {
            return redirect()->route('cart.view')->with('error', 'Fout bij het ophalen van de ordergegevens: ' . $e->getMessage());
        }
    }
}
