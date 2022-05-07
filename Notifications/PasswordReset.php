<?php

namespace Luanardev\Modules\ControlPanel\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;

class PasswordReset extends Notification implements ShouldQueue
{
    use Queueable;

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

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->markdown('controlpanel::emails.password-reset', [
                    'user' => $this->user,
                    'password' => $this->password
                ]);
    }


}
