<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ImportNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Importe masivo de productos')
                    ->greeting('Señor don patrón!')
                    ->line('Su proceso de importe ha comenzado')
                    ->line('Si algo sale mal, le enviaremos otro(s) correos con más detalles, y si persiste, 
                    contacte a alguien más competente que usted si no sabe cómo proceder', url('/dashboard'))
                    ->action('Volver a la página', url('/dashboard'));
    }
}
