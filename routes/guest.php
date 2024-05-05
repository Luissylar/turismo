<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\Guest\GuestHomeController;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', [GuestHomeController::class, 'index'])->name('home');
