<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventoFotografo extends Mailable
{
    use Queueable, SerializesModels;

    public $invitacion;
    public $archivoQR;
    public $urlComprobacion;

    public function __construct($invitacion, $archivoQR, $urlComprobacion)
    {
        $this->invitacion = $invitacion;
        $this->archivoQR = $archivoQR;
        $this->urlComprobacion = $urlComprobacion;
    }

    public function build()
    {
        return $this->view('emails.invitado-fotografo')
                    ->attach(public_path("{$this->archivoQR}"), [
                        'as' => 'codigo_qr.png',
                        'mime' => 'image/png',
                    ])
                    ->with(['urlComprobacion' => $this->urlComprobacion]);
    }
}
