<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/categories', [PageController::class, 'categories'])->name('categories');
Route::get('/about', [PageController::class, 'about'])->name('about');

// untuk otentikasi pelanggan


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
