<?php

namespace Luanardev\Modules\ControlPanel\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Luanardev\Modules\ControlPanel\Events\PasswordReset;
use Luanardev\Modules\ControlPanel\Notifications\PasswordReset as NewPassword;

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
