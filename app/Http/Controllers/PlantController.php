<?php

namespace App\Http\Controllers;

use App\Models\Plants;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Plants::all(); // Fetch all products from the database


        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CreatePlants');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'deliverytime' => 'required|integer',
            'light' => 'nullable|string|max:255',
            'water' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'amount' => 'required|integer',
            'image' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
        ]);

        Plants::create($validatedData);

        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])->success('Plant is succesvol aangemaakt!');

        return redirect()->route('voorraad');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plants $plant)
    {
        
        return view('product', ['product' => $plant]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $plant = Plants::findOrFail($id);
        return view('UpdatePlants', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plant = Plants::findOrFail($id);

        $plant->update($request->all());

        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])->success('Plant is succesvol bijgewerkt!');

        return redirect()->route('voorraad');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plant = Plants::findOrFail($id);
        $plant->delete();

        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])->success('Plant is succesvol verwijderd!');

        return redirect()->route('voorraad');
    }

    public function filterByPrice(Request $request)
    {
        // Haal de min en max prijzen op
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');


        $minPrice = $minPrice ? $minPrice : Plants::min('price');
        $maxPrice = $maxPrice ? $maxPrice : Plants::max('price');

        // Query om de planten op te halen tussen de ingegeven prijzen
        $products = Plants::whereBetween('price', [$minPrice, $maxPrice])->get();

        return view('index', compact('products'));
    }

    public function inventory()
    {
        $products = Plants::all(); // Haal alle planten uit de database

        return view('vooraad', compact('products')); // Geef de planten door aan de view
    }
}
