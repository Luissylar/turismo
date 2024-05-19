<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Client\Payment\PaymentMethodAdded;
use App\Events\Client\Payment\PaymentMethodDeleted;

use Inertia\Inertia;

class ClientBillingController extends Controller
{
    public $name;

    public function index(Request $request)
    {
        $user = $request->user(); // Asegúrate de tener autenticación y un usuario logueado.
        $intent = $user->createSetupIntent();
        $paymentMethods = $user->paymentMethods(); // Recupera los métodos de pago del usuario

        // Envía la clave pública de Stripe y los métodos de pago a la vista.
        return Inertia::render('Client/Billings/Index', [
            'intent' => $intent,
            'stripeKey' => env('STRIPE_KEY'), // Obtiene la clave pública de Stripe desde las variables de entorno.
            'paymentMethods' => $paymentMethods // Pasa los métodos de pago a la vista.
        ]);
    }
    public function storePaymentMethod(Request $request)
    {
        $request->validate([
            'payment_method_id' => 'required|string',
        ]);

        $user = $request->user();
        $paymentMethodId = $request->input('payment_method_id');

        // Asocia el método de pago con el usuario
        $user->updateDefaultPaymentMethod($paymentMethodId);

        // Recupera el método de pago agregado
        $paymentMethod = $user->findPaymentMethod($paymentMethodId);

        // Despachar evento con el método de pago agregado
        event(new PaymentMethodAdded($user, $paymentMethod));



        return response()->json([
            'message' => 'Metodo de pago agregado con éxito', // Mensaje del backend
            'paymentMethod' => $paymentMethod,
        ]);
    }






    public function deletePaymentMethod(Request $request, $paymentMethodId)
    {
        $user = $request->user();
        $paymentMethod = $user->findPaymentMethod($paymentMethodId);

        if ($paymentMethod) {
            $paymentMethod->delete();
            // Despachar evento
            event(new PaymentMethodDeleted($user, $paymentMethodId));

            return response()->json([
                'message' => 'Metodo de pago eliminado',
            ]);
        } else {
            return response()->json([
                'message' => 'Payment method not found',
            ], 404);
        }
    }
}
