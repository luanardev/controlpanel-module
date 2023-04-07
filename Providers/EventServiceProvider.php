<?php

namespace Lumis\Controlpanel\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Lumis\Controlpanel\Events\PasswordReset;
use Lumis\Controlpanel\Events\UserCreated;
use Lumis\Controlpanel\Listeners\SendNewPassword;
use Lumis\Controlpanel\Listeners\SendUserAccount;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserCreated::class => [
            SendUserAccount::class
        ],

        PasswordReset::class => [
            SendNewPassword::class
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
