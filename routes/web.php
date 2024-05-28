<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\ClientBillingController;
use App\Http\Controllers\Client\Payments\PaymentsController;
use Inertia\Inertia;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/billings', [ClientBillingController::class, 'index'])->name('client.billings.index');
    Route::post('/billing/payment-method', [ClientBillingController::class, 'storePaymentMethod'])->name('billing.payment-method.store');
    Route::delete('/billing/payment-method/{paymentMethodId}', [ClientBillingController::class, 'deletePaymentMethod'])->name('billing.payment-method.delete');

    //PASARELAS DE PAGO LOCALES
    Route::get('/payments', [PaymentsController::class,'home'])->name('client.payments.home');



});
