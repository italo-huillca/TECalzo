<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Product;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/products/category/{id}', [ProductController::class, 'category'])->name('products.category');

Route::get('/products/search', [ProductSearchController::class, 'index'])->name('products.search');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Historial 

Route::get('/orders/history', [OrderHistoryController::class, 'index'])
    ->name('orders.history')
    ->middleware('auth');

// Rutas del carrito de compras

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Rutas para el perfil del usuario autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/checkout', [OrderController::class, 'checkoutForm'])->name('orders.checkoutForm');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard'); 
    })->name('admin.dashboard');

    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index'); // Ver todos los productos
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create'); // Crear producto
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store'); // Guardar nuevo producto
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit'); // Editar producto
    Route::put('/admin/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update'); // Actualizar producto
    Route::delete('/admin/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy'); // Eliminar producto

    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/{id}/edit', [AdminOrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/admin/orders/{id}', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');

});

require __DIR__ . '/auth.php';
