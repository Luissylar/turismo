<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminMailTemplateController;
use App\Http\Controllers\Admin\Facturacion\AdminFacturacionController;
use App\Http\Controllers\Admin\Help\AdminHelpController;
use App\Http\Controllers\Admin\Profile\AdminProfileController;
use App\Http\Controllers\Admin\Setting\AdminSettingController;
use App\Http\Controllers\Admin\Sunat\AdminSunatController;

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

    Route::get('/admin/setting',[AdminSettingController::class,'index'])->name('admin.setting');
    Route::get('/admin/profile',[AdminProfileController::class,'index'])->name('admin.profile.show');

    Route::get('/admin/help',[AdminHelpController::class,'index'])->name('admin.help.index');

    //Facturacion Simple
    Route::get('/admin/facturacion',[AdminFacturacionController::class,'home'])->name('admin.facturacion.home');



    //SUNAT
    Route::get('/admin/sunat/dashboard',[AdminSunatController::class,'index'])->name('admin.sunat.dashboard');







});
