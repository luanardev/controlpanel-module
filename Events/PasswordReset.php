<?php

namespace Lumis\Controlpanel\Events;

use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PasswordReset
{
    use Dispatchable, SerializesModels;

    /**
     *
     * @var User
     */
    public User $user;

    /**
     * @var string
     */
    public string $password;

    /**
     * Create a new event instance.
     * @param User $user
     * @param string $password
     * @return void
     */
    public function __construct(User $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

}
