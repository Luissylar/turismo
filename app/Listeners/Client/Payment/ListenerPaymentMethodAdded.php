<?php

namespace App\Listeners\Client\Payment;

use App\Events\Client\Payment\PaymentMethodAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\Client\Payment\PaymentMethodAddedNotification;

class ListenerPaymentMethodAdded implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(PaymentMethodAdded $event): void
    {
        // Enviar la notificación al usuario
        $event->user->notify(new PaymentMethodAddedNotification($event->paymentMethod));
    }
}
