<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\KuinController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', [PlantController::class, 'index'])->name('index');
Route::get('/filter', [PlantController::class, 'filterByPrice'])->name('filterByPrice');

Route::get('/product/{plant}', [PlantController::class, 'show'])->name('product.show');


Route::get('/contact', function () {
    return view('Contact');
})->name('contact');

Route::get('/dashboard', [KuinController::class, 'readProducts'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/voorraad', [PlantController::class, 'inventory'])->name('voorraad');


Route::get('/winkelwagen', [KuinController::class, 'viewCart'])->name('winkelwagen');

//Routes voor producten in de winkelwagen
Route::get('/cart', [KuinController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add', [KuinController::class, 'addToCart'])->name('cart.add');


Route::delete('/cart/remove/{productId}', [KuinController::class, 'removeFromCart'])->name('cart.remove');
Route::patch('/cart/update/{productId}', [KuinController::class, 'updateQuantity'])->name('cart.update');

//routes voor het bestellen van de producten in de winkelwagen
Route::post('/cart/order', [KuinController::class, 'postOrderToApi'])->name('cart.order');
Route::get('/cart/thankyou', [KuinController::class, 'viewThankYou'])->name('cart.thankyou');

Route::get('/orders', [KuinController::class, 'viewOrders'])->name('orders.view');

//routes voor het aanmaken en updaten van een nieuwe plant
Route::get('/plants/create', [PlantController::class, 'create'])->name('plants.create');
Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
Route::put('/plants/{id}', [PlantController::class, 'update'])->name('plants.update');
Route::get('/plants/{id}/edit', [PlantController::class, 'edit'])->name('plants.edit');
Route::delete('/plants/{id}', [PlantController::class, 'destroy'])->name('plants.destroy');









require __DIR__ . '/auth.php';
