<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;

class ClientBillingController extends Controller
{
    public $name;

    public function index(Request $request)
    {
        $user = $request->user(); // Asegúrate de tener autenticación y un usuario logueado.
        $intent = $user->createSetupIntent();

        // Envía la clave pública de Stripe a la vista.
        return Inertia::render('Client/Billings/Index', [
            'intent' => $intent,
            'stripeKey' => env('STRIPE_KEY') // Obtiene la clave pública de Stripe desde las variables de entorno.
        ]);
    }

}
