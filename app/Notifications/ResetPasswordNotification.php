<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.')
                    ->action('Restablecer Contraseña', url(config('app.url').route('password.reset', $this->token, false)))
                    ->line('Si no solicitó un restablecimiento de contraseña, no se requiere ninguna acción adicional. Luis');
    }
}

