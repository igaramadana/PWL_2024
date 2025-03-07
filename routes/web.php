<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
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

// Basic Routing
Route::get('/1', function () {
    return 'Selamat Datang';
});

Route::get('/helloo', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/about', function () {
    return 'Iga Ramadana Sahputra - 2341760083';
});

// Route Parameter
Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . ' Komentar ke-:' . $commentId;
});

Route::get('/articles/{id}', function ($id) {
    return 'Halaman artikel dengan ID ' . $id;
});

// Optional Parameter
Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});

// Route Name
Route::get('/user/profile', function () {
    //
})->name('profile');

// Controller
Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles/{id}', [ArticleController::class, 'articles']);

// Resource Controller
Route::resource('photos', PhotoController::class)->only([
    'index',
    'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]);

// View
Route::get('/greeting', function () {
    return view('hello', ['name' => 'Iga Ramadana Sahputra']);
});

Route::get('/greeting', [WelcomeController::class, 'greeting']);

// Soal Praktikum Jobsheet 2
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage'])->name('products.foodBeverage');
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth'])->name('products.beautyHealth');;
    Route::get('/home-care', [ProductController::class, 'homeCare'])->name('products.homeCare');;
    Route::get('/baby-kid', [ProductController::class, 'babyKid'])->name('products.babyKid');;
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'show'])->name('user.show');
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
