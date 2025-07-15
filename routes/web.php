<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Middleware\IsCustomerLogin;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/categories', [PageController::class, 'categories'])->name('categories');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show'); // ← DITAMBAHKAN



// autentikasi pelanggan
Route::controller(CustomerAuthController::class)->prefix('customer')->name('customer.')->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::post('/logout', 'logout')->name('logout');
});


/* ------------------------------------------------------------------------
|  Route yang hanya bisa diakses customer login
------------------------------------------------------------------------ */
// Route::middleware(['is_customer_login'])->group(function () {

//     /* Contoh: dashboard customer (opsional) */
//     Route::view('/customer/dashboard', 'pages.customer.dashboard')->name('customer.dashboard');

//     /* Rute Keranjang */
//     Route::controller(CartController::class)->group(function () {
//         Route::post('cart/add',          'add')    ->name('cart.add');
//         Route::delete('cart/remove/{id}','remove') ->name('cart.remove');
//         Route::patch('cart/update/{id}', 'update') ->name('cart.update');
//         Route::get('cart',               'index')  ->name('cart.index');   // tampilan keranjang
//         Route::post('cart/checkout',     'checkout')->name('cart.checkout');// contoh checkout
//     });
// });
// untuk dashboard dan pengaturan




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';