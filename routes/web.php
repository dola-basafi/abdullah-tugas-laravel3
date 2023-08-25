<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});

Route::any('/login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware(["noAuth"]);

Route::get('/register', function () {
    return view('register');
})->name('register_form')->middleware(["noAuth"]);

Route::post('/register', [PenggunaController::class, 'register']);

Route::middleware(["withAuth"])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk.index');

    Route::middleware(['withAuth'])->group(function () {
        Route::get('/create', function () {
            return view('create');
        })->name('produk.create.form');
        Route::post('/create', [ProdukController::class, 'store'])->name('produk.create');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('editForm');
        Route::put('/edit/{id}', [ProdukController::class, 'update'])->name('edit');
        Route::delete('/delete/{id}',[ProdukController::class,'destroy'])->name('delete');
    });
});
