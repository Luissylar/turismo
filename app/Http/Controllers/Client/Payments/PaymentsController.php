<?php

namespace App\Http\Controllers\Client\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use Inertia\Inertia;


class PaymentsController extends Controller
{
    public function home()
    {
        $formToken = $this->generateFormToken();

        //return Inertia::render('Client/Payments/Home', compact('formToken'));
        return Inertia::render('Client/Payments/Home', [
            'formToken' => $formToken,
        ]);
    }
    private function generateFormToken()
    {
        $auth = base64_encode(config('services.izipay.client_id') . ':' . config('services.izipay.client_secret'));

        $response = Http::withHeaders([
            'Authorization' => "Basic $auth",
            'Content-Type' => 'application/json',


        ])->post(config('services.izipay.url'), [
            'amount' => 10000,
            'currency' => 'USD',
            'orderId' => Str::random(20),
            'customer' => [
                'email' => auth()->user()->email,
            ]
        ])->json();
        return $response['answer']['formToken'];
    }
}
