<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered as UserRegisteredMail;
use App\Mail\AdminNotification;

class UserRegisteredListener
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
    public function handle(object $event): void
    {
        // Enviar correo electrónico al usuario registrado
        Mail::to($event->user->email)->send(new UserRegisteredMail($event->user));

        // Enviar correo electrónico al administrador del sistema
        Mail::to($event->adminEmail)->send(new AdminNotification($event->user));
    }
}
