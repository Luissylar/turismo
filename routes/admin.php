<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::middleware(['web', 'auth'])->group(function () {
    // Redirección desde /admin a /admin/dashboard
    Route::redirect('/admin', '/admin/dashboard');

    // Ruta para el dashboard de administración utilizando el controlador
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
