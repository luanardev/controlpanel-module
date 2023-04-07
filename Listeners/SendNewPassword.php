<?php

namespace Lumis\Controlpanel\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Lumis\Controlpanel\Events\PasswordReset;
use Lumis\Controlpanel\Notifications\PasswordReset as NewPassword;

class SendNewPassword implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param PasswordReset $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        Notification::send(
            $event->user,
            new NewPassword($event->user, $event->password)
        );

    }
}
