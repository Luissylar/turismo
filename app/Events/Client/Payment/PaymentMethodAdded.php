<?php

namespace App\Events\Client\Payment;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

use Illuminate\Queue\SerializesModels;


use App\Models\User;
use Laravel\Cashier\PaymentMethod;

class PaymentMethodAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     public $user;
     public $paymentMethod;

     public function __construct(User $user, PaymentMethod $paymentMethod)
     {
         $this->user = $user;
         $this->paymentMethod = $paymentMethod;
     }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
