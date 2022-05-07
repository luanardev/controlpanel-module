<?php

namespace Luanardev\Modules\ControlPanel\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Luanardev\Modules\ControlPanel\Events\UserCreated;
use Luanardev\Modules\ControlPanel\Notifications\UserAccount;

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
