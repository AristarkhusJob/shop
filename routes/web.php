<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Products;
use App\Http\Livewire\Shops;
use App\Http\Livewire\Carts;
use App\Http\Livewire\Checkouts;
use App\Http\Livewire\Welcomes;
use App\Http\Controllers\HomeController;
  


Route::get('/', function () {
    return redirect('home');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('product', Products::class)->name('product');
Route::get('shop', Shops::class)->name('shop');
Route::get('cart', Carts::class)->name('cart');


Route::resource('home', HomeController::class);
