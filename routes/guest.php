<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\Guest\GuestHomeController;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ElimiarController;


use App\Http\Controllers\Guest\GuestTourController;

use App\Http\Controllers\TestController;
Route::get('/', [GuestHomeController::class, 'index'])->name('home');



//Route::get('/tours/index', [GuestTourController::class, 'index'])->name('tours.index');
//Route::get('/tours/show', [GuestTourController::class, 'show'])->name('tours.show');

Route::get('/tours', [GuestTourController::class, 'index'])->name('tours.index');
Route::get('/tours/{tour}', [GuestTourController::class, 'show'])->name('tours.show');



//eliminar xd PUTO EL QUE LO LEA
Route::get('/xd',[ElimiarController::class,'index'])->name('xd');
Route::get('/lala',[TestController::class,'index'])->name('test');


Route::get('/test-redis', function () {
    cache()->store('redis')->put('key', 'Redis is working!', 10);
    return cache()->store('redis')->get('key');
});
