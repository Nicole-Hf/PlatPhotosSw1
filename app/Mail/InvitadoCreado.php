<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitadoCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $invitacion;

    public function __construct($invitacion)
    {
        $this->invitacion = $invitacion;
    }

    public function build()
    {
        return $this->view('emails.invitado-creado')
            ->subject('¡Bienvenido a nuestro evento!');
    }
}
