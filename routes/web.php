<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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

// Route::get('/posts/index', [PostController::class, 'index']);

Route::get('/buku/index', [BukuController::class, 'index'])->name('buku.index');

Route::get('/buku/create', [BukuController::class, 'create'])->name ('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');


Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');


Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');


// Route::get ('/buku/search', [BukuController::class, 'show'])->name('buku.search');//@search

Route::get('/buku/search', [BukuController::class, 'search']) -> name('buku.search');






Route::get('/buku/show', function () {
    return view('buku.show');
})->name('buku.show');
