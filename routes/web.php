<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserController;
// Login Routes
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);

// register
Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/', [ProductController::class, 'index']);

Route::get('/detail/{id}', [ProductController::class, 'detail']);

Route::get('/search', [ProductController::class, 'search']);

Route::post('/add_to_cart', [ProductController::class, 'addToCart']);

Route::get('/cartlist', [ProductController::class, 'cartList']);

Route::get('/removecart/{id}', [ProductController::class, 'removeCart']);

Route::get('/ordernow', [ProductController::class, 'orderNow']);

Route::post('/orderplace', [ProductController::class, 'orderPlace']);

Route::get('/myorder', [ProductController::class, 'myOrder']);

// ================= PROTECTED ADMIN PANEL =================
Route::middleware(['admin'])->group(function () {

    // Dashboard
    Route::get('/admin', [AdminController::class, 'dashboard']);

    // Products
    Route::get('/admin/products', [AdminProductController::class, 'index']);
    Route::get('/admin/products/create', [AdminProductController::class, 'create']);
    Route::post('/admin/products/store', [AdminProductController::class, 'store']);
    Route::get('/admin/products/edit/{id}', [AdminProductController::class, 'edit']);
    Route::put('/admin/products/update/{id}', [AdminProductController::class, 'update']);
    Route::delete('/admin/products/delete/{id}', [AdminProductController::class, 'destroy']);

    // Orders
    Route::get('/admin/orders', [AdminOrderController::class, 'index']);
    Route::post('/admin/orders/update/{id}', [AdminOrderController::class, 'updateStatus']);

    // Users
    Route::get('/admin/users', [AdminUserController::class, 'index']);
    Route::delete('/admin/users/delete/{id}', [AdminUserController::class, 'destroy']);

});