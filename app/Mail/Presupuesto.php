<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Presupuesto extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $localidad, $telefono, $email, $mensaje, $archivo)
    {
        $this->nombre = $nombre;
        $this->localidad = $localidad;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->mensaje = $mensaje;
        $this->archivo = $archivo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('page.form.presupuesto')->with([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'localidad' => $this->localidad,
            'email' => $this->email,
            'mensaje' => $this->mensaje
        ])->attach($this->archivo->getRealPath(),
        [
            'as' => $this->archivo->getClientOriginalName(),
            'mime' => $this->archivo->getClientMimeType(),
        ]);
    }
}
