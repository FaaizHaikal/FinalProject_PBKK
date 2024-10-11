<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Counter;
use App\Http\Livewire\LoginController;
use App\Http\Livewire\RegisterController;
use App\Http\Livewire\UploadTest;
use App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class . '@index')->middleware('auth');
Route::post('/hello', HomeController::class . '@hello');
Route::post('/signout', HomeController::class . '@SignOut')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/auth')->group(function () {
    Route::get('/login', LoginController::class)->name('login');
    Route::get('/register', RegisterController::class)->name('register');
});


Route::get('/counter', Counter::class)->middleware('auth');
Route::get('/upload', UploadTest::class);
