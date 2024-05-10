<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminMailTemplateController;

Route::middleware(['web', 'auth'])->group(function () {
    // Redirección desde /admin a /admin/dashboard
    Route::redirect('/admin', '/admin/dashboard');
    // Ruta para el dashboard de administración utilizando el controlador
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->middleware('can:admin.dashboard')
        ->name('admin.dashboard');
    //ruta para destinos de tipo resource
    Route::resource('/admin/destinations', AdminDestinationController::class)
        ->names([
            'index' => 'admin.destinations.index',
            'create' => 'admin.destinations.create',
            'show' => 'admin.destinations.show',
            'edit' => 'admin.destinations.edit',
        ]);
    Route::get('/admin/mail',[AdminMailTemplateController::class,'index'])->name('admin.mail');
});
