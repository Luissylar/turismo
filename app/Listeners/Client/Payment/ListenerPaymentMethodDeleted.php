<?php

namespace App\Listeners\Client\Payment;

use App\Events\Client\Payment\PaymentMethodDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerPaymentMethodDeleted
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentMethodDeleted $event): void
    {
        //
    }
}
