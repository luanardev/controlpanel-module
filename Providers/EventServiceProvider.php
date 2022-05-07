<?php

namespace Luanardev\Modules\ControlPanel\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Luanardev\Modules\ControlPanel\Events\UserCreated::class => [
            \Luanardev\Modules\ControlPanel\Listeners\SendUserAccount::class
        ],

        \Luanardev\Modules\ControlPanel\Events\PasswordReset::class => [
            \Luanardev\Modules\ControlPanel\Listeners\SendNewPassword::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
       

    }


}
