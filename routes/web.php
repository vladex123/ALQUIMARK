<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ReservationController;

// Ruta de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta de búsqueda
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// Ruta del panel de usuario
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Otras rutas
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/offers', [OfferController::class, 'index'])->name('offers');
Route::get('/history', [HistoryController::class, 'index'])->name('history')->middleware('auth');
Route::get('/publish', [PublishController::class, 'index'])->name('publish')->middleware('auth');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/category/properties', [CategoryController::class, 'properties'])->name('category.properties');
Route::get('/category/vehicles', [CategoryController::class, 'vehicles'])->name('category.vehicles');
Route::get('/category/tools', [CategoryController::class, 'tools'])->name('category.tools');
Route::get('/category/electronics', [CategoryController::class, 'electronics'])->name('category.electronics');
Route::get('/category/events', [CategoryController::class, 'events'])->name('category.events');
Route::get('/category/sports', [CategoryController::class, 'sports'])->name('category.sports');
Route::get('/benefit/{slug}', [BenefitController::class, 'show'])->name('benefit.show');

// Rutas de registro
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('register/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('register.google');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index')->middleware('auth');
// Rutas de restablecimiento de contraseña
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/products/{product}/reserve', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/products/{product}/reserve', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
});