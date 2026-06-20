<?php
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::resource('/admin/categories', CategoryController::class);

Route::get('/seller/dashboard', function () {
    return view('dashboard');
})->name('seller.dashboard');

Route::get('/seller/orders', [OrderController::class, 'sellerOrders'])
    ->name('seller.orders');

Route::get('/seller/products', [ProductController::class, 'sellerProducts'])
    ->name('seller.products');

Route::get('/seller/products/create', [ProductController::class, 'create'])
    ->name('seller.products.create');

Route::post('/seller/products', [ProductController::class, 'store'])
    ->name('seller.products.store');

Route::get('/seller/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('seller.products.edit');

Route::put('/seller/products/{product}', [ProductController::class, 'update'])
    ->name('seller.products.update');

Route::delete('/seller/products/{product}', [ProductController::class, 'destroy'])
    ->name('seller.products.destroy');

Route::get('/seller/ventes', [ProductController::class, 'ventes'])
    ->name('seller.ventes');

Route::get('/catalogue', [ProductController::class, 'catalogue'])
    ->name('catalogue');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store');

Route::get('/orders/my', [OrderController::class, 'myOrders'])
    ->name('orders.my');

Route::post('/orders/{order}/pay',[OrderController::class, 'pay'])
    ->name('orders.pay');

Route::get('/livraisons', function () {
    return view('livraisons.index');
})->name('livraisons');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
