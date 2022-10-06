<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Invitacion;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function mark_all_notifications() {
        auth()->user()->unreadNotifications->markAsRead();
        $invitaciones = Invitacion::where([
            'fotografo_id' => auth()->user()->id,
        ])->get();
        return redirect()->route('catalogos.index', compact('invitaciones'));
    }

    public function mark_a_notification($notification_id, $evento_id) {
        auth()->user()->unreadNotifications->when($notification_id, function($query) use ($notification_id) {
            return $query->where('id', $notification_id);
        })->markAsRead();

        $evento = Evento::find($evento_id);

        return redirect()->route('eventos.invitation', $evento);
    }
}
