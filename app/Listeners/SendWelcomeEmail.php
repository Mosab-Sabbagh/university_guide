<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\WelcomeStudentNotification;
use App\Role\UserRole;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        /** @var User $user */
        $user = ($event->user);

        if ($user->user_type === UserRole::STUDENT) {
            $user->notify(new WelcomeStudentNotification());
        }
    }
}
