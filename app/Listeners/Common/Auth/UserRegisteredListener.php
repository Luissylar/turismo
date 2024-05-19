<?php

namespace App\Listeners\Common\Auth;

use App\Mail\Common\Auth\WelcomeNewUserMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;



class UserRegisteredListener implements ShouldQueue
{
    use InteractsWithQueue;

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
    public function handle(Registered $event): void
    {
        $user = $event->user;

        try {
            // No modificar, funciona, si observas subrayado el "createAsStripeCustomer", es porque es un problema con el idle, nada más.
            if (!$user->stripe_id) {
                $user->createAsStripeCustomer();
                Log::info("Stripe customer created for user: {$user->email}");
            }

            // Enviar correo de bienvenida
            Mail::to($user->email)->queue(new WelcomeNewUserMail($user));
            Log::info("Queued WelcomeNewUserMail for user: {$user->email}");

        } catch (\Exception $exception) {
            // Loguear cualquier excepción que ocurra durante el proceso
            Log::error("Failed in UserRegisteredListener for user: {$user->email} - {$exception->getMessage()}");
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(Registered $event, \Exception $exception): void
    {
        $user = $event->user;
        Log::error("Failed to process Registered event for user: {$user->email} - {$exception->getMessage()}");
    }
}
