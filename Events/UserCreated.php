<?php

namespace Luanardev\Modules\ControlPanel\Events;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserCreated
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
