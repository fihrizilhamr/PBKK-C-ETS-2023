<?php

use App\Http\Controllers\FormProduct;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormProductController;
use App\Http\Controllers\ListProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/form_product', [FormProductController::class, 'showForm'])->name('form_product');
    Route::post('/form_product', [FormProductController::class, 'submitForm']);


    Route::get('/list_product', [ListProductController::class, 'showUsers'])->name('list_product');
    Route::get('/edit/{id}', [ListProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [ListProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [ListProductController::class,'delete'])->name('product.delete');
});

require __DIR__.'/auth.php';

