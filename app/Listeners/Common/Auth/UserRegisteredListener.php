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
            Mail::to($user->email)->queue(new WelcomeNewUserMail($user));
            Log::info("Queued WelcomeNewUserMail for user: {$user->email}");
        } catch (\Exception $exception) {
            Log::error("Failed to queue WelcomeNewUserMail for user: {$user->email} - {$exception->getMessage()}");
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
