<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\CalculatorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hai', function() {
    return view('coba.index');
});

route::get('kali', [CalculatorController::class, 'viewKali']);
route::get('kurang', [CalculatorController::class, 'viewKurang']);
route::get('bagi', [CalculatorController::class, 'viewBagi']);

route::get('tambah', [CalculatorController::class, 'viewTambah']); 
route::post('tambah/store', [CalculatorController::class, 'tambahAction'])->name('tambah.store');
route::post('kali/store', [CalculatorController::class, 'kaliAction'])->name('kali.store');
route::post('kurang/store', [CalculatorController::class, 'kurangAction'])->name('kurang.store');
route::post('bagi/store', [CalculatorController::class, 'bagiAction'])->name('bagi.store');

//CRUD SEDERHANA    
route::get('index', [CrudController::class, 'index'])->name('crud.index');
route::get('create', [CrudController::class, 'create'])->name('crud.create');
route::post('store', [CrudController::class, 'store'])->name('crud.store');
route::get('crud/edit/{id}', [CrudController::class, 'edit'])->name('crud.edit');
route::put('crud/update/{id}', [CrudController::class, 'update'])->name('crud.update');
route::delete('crud/delete/{id}', [CrudController::class, 'destroy'])->name('crud.delete');

//Auth
route::post('store/auth', [AuthController::class, 'store'])->name('login');
route::get('login', [AuthController::class, 'index']);

//Dashboard
route::get('dashboard/pic', [PicController::class, 'index'])->name('pic');
route::post('logout', [AuthController::class, 'destroy']);