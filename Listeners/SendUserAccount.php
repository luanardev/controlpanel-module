<?php

namespace Lumis\Controlpanel\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Lumis\Controlpanel\Events\UserCreated;
use Lumis\Controlpanel\Notifications\UserAccount;

class SendUserAccount implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param UserCreated $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        Notification::send(
            $event->user,
            new UserAccount($event->user, $event->password)
        );

    }
}
