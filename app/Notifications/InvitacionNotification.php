<?php

namespace App\Notifications;

use App\Models\Invitacion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvitacionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Invitacion $invitacion)
    {
        $this->invitacion = $invitacion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'evento_id'  => $this->invitacion->evento->id,
            'organizador_id' => $this->invitacion->evento->organizer_id,
            'name' => $this->invitacion->evento->organizer->name,
            'title' => $this->invitacion->evento->title,
            'create_date' => $this->invitacion->evento->create_date,
            'code_qr' => $this->invitacion->evento->code_qr,
        ];
    }
}
