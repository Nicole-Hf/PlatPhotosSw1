<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\InvitacionNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class InvitacionListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        /*User::role('Fotografo')->each(function(User $user) use ($event) {
            Notification::send($user, new InvitacionNotification($event->invitacion));
        });*/

        $user = User::find($event->invitacion->fotografo_id);

        Notification::send($user, new InvitacionNotification($event->invitacion));
    }
}
