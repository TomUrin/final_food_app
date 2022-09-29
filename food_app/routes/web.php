<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RestaurantController as R;
use App\Http\Controllers\MenuController as M;
use App\Http\Controllers\DishController as D;
use App\Http\Controllers\OrderController as O;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pick-food', [D::class, 'pick'])->name('food-pick');


// Restaurants

Route::prefix('restaurant')->name('restaurant-')->group(function () {
    Route::get('', [R::class, 'index'])->name('index');
    Route::get('create', [R::class, 'create'])->name('create');
    Route::post('', [R::class, 'store'])->name('store');
    Route::get('edit/{restaurant}', [R::class, 'edit'])->name('edit');
    Route::put('{restaurant}', [R::class, 'update'])->name('update');
    Route::delete('{restaurant}', [R::class, 'destroy'])->name('delete');
    Route::get('show/{id}', [R::class, 'show'])->name('show');    
});

// Menus

Route::prefix('menu')->name('menu-')->group(function () {
    Route::get('', [M::class, 'index'])->name('index');
    Route::get('create', [M::class, 'create'])->name('create');
    Route::post('', [M::class, 'store'])->name('store');
    Route::get('edit/{menu}', [M::class, 'edit'])->name('edit');
    Route::put('{menu}', [M::class, 'update'])->name('update');
    Route::delete('{menu}', [M::class, 'destroy'])->name('delete');
    Route::get('show/{id}', [M::class, 'show'])->name('show');
});


// Food

Route::prefix('dish')->name('dish-')->group(function () {
    Route::get('', [D::class, 'index'])->name('index');
    Route::get('create', [D::class, 'create'])->name('create');
    Route::post('', [D::class, 'store'])->name('store');
    Route::get('edit/{dish}', [D::class, 'edit'])->name('edit');
    Route::put('{dish}', [D::class, 'update'])->name('update');
    Route::delete('{dish}', [D::class, 'destroy'])->name('delete');
    Route::get('show/{id}', [D::class, 'show'])->name('show');
    Route::put('delete-picture/{dish}', [D::class, 'deletePicture'])->name('delete-picture'); 
});

// Orders


Route::post('add-food-to-order', [O::class, 'add'])->name('pickFood-add');
Route::get('my-orders', [O::class, 'showMyOrders'])->name('my-orders');
Route::prefix('order')->name('selectedServices-')->group(function () {
    Route::get('', [O::class, 'index'])->name('index');
    Route::put('status/{order}', [O::class, 'setStatus'])->name('status');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
