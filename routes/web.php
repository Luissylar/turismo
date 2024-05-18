<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});






use App\Mail\Common\Auth\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;

Route::get('/test-email', function () {
    $user = \App\Models\User::first(); // Ajusta esto para seleccionar un usuario de prueba
    Mail::to($user->email)->send(new WelcomeNewUserMail($user));
    return 'Correo enviado!';
});







