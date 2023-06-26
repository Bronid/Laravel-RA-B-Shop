<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\AddProductComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DeleteProductComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\EditProductComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\Seller\SellerDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeComponent::class)->name('index');

Route::get('/product/{id}', DetailsComponent::class)->name('product.details');

Route::get('/cart', CartComponent::class)->name('cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/search', SearchComponent::class)->name('search');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth', 'authadmin'])->group(function() {
    Route::get('/dashboard/addproduct', AddProductComponent::class)->name('addproduct.dashboard');
    Route::get('/dashboard/editproduct/{product_id}', EditProductComponent::class)->name('editproduct.dashboard');
});

Route::middleware(['auth', 'authseller'])->group(function() {
    Route::get('/dashboard/addproduct', AddProductComponent::class)->name('addproduct.dashboard');
    Route::get('/dashboard/editproduct/{product_id}', EditProductComponent::class)->name('editproduct.dashboard');
    Route::get('/dashboard/deleteproduct/{product_id}', DeleteProductComponent::class)->name('deleteproduct.dashboard');
});

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
