<?php

namespace App\Http\Controllers;

use App\Events\InvitacionEvent;
use App\Models\Contratado;
use App\Models\Evento;
use App\Models\Invitacion;
use App\Models\User;
use App\Notifications\InvitacionNotification;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotografo_id = auth()->user()->id;
        $invitaciones = Invitacion::where([
            'fotografo_id' => $fotografo_id,
            'estado' => 'Aceptado',
        ])->get();

        return view('catalogos.index', compact('invitaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $fotografo_id)
    {
        $invitacion = Invitacion::create([
            'evento_id' => $request->evento_id,
            'fotografo_id' => $fotografo_id,
        ]);

        $this->makeInvitacionNotification($invitacion);

        return redirect()->route('fotografos.index');
    }

    /**
     * Notificar invitacion a los usuarios.
     *
     */
    public function makeInvitacionNotification($invitacion)
    {
        event(new InvitacionEvent($invitacion));

        /*User::role('Fotografo')->each(function(User $user) use ($invitacion) {
            $user->notify(new InvitacionNotification($invitacion));
        });*/
    }

    /**
     * Change status of invitation to Acepted
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($evento_id)
    {
        $evento = Evento::find($evento_id);
        $fotografo_id = auth()->user()->id;

        $invitacion = Invitacion::where([
            'evento_id' => $evento->id,
            'fotografo_id' => $fotografo_id,
        ])->first();

        $invitacion->estado = 'Aceptado';
        $invitacion->save();

        return redirect()->route('invitaciones.index');
    }
}
