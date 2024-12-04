<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Counter;
use App\Http\Livewire\LoginController;
use App\Http\Livewire\RegisterController;
use App\Http\Livewire\UploadTest;
use App\Http\Livewire\StoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;

$host = parse_url(config('app.url'), PHP_URL_HOST);

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
// Landing Page
Route::get('/', LandingController::class . '@index');
// Home page
Route::get('/home', HomeController::class . '@index')->middleware('auth');
// Store Page
Route::get('/mystore', StoreController::class)->middleware('auth');
// Search Operation
Route::get('/search-query/{category}', [QueryController::class, 'index']);
// Cart Operation
Route::post('cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::put('/update/{productId}', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Auth
Route::post('/signout', HomeController::class . '@SignOut')->middleware('auth');
// Roboflow Integration
Route::get('/upload', UploadTest::class);

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/auth')->group(function () {
    Route::get('/login', LoginController::class)->name('login');
    Route::get('/register', RegisterController::class)->name('register');
});

Route::get('/sell-product', function () {
    return view('sellProduct');
});

// TODO: Add a route to handle the form submission
// Route::post('/sell-product', 'ProductController@sellProduct');


Route::get('/counter', Counter::class)->middleware('auth');
Route::post('/hello', HomeController::class . '@hello');
