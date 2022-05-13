<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FailedImportNotification extends Notification implements ShouldQueue
{
    use Queueable;

    //public $failure;

    /*public function __construct()
    {
        $this->failure = $failure;
    }*/

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Importe masivo de productos')
                    ->greeting('Señor don patrón!')
                    ->line('Su importe ha sido defectuoso')
                    ->line('error en la linea ' /*. $this->failure->row()*/)
                    ->line('en el campo ' /*. $this->failure->attribute()*/)
                    ->line('Revise qué hizo mal, la instrucciones fueron MUY CLARAS, 
                    y contacte a alguien más competente que usted por si encuentra algún error', url('/dashboard'))
                    ->action('Volver a la página', url('/dashboard'));
    }
}
