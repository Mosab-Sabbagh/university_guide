<?php

namespace App\Listeners;

use App\Events\BookRequestAccepted;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RequestAcceptedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationToRequester
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
    public function handle(BookRequestAccepted $event): void
    {
        $user = $event->bookRequest->user; // assuming 'user' relation exists in BookRequest
        Notification::send($user, new RequestAcceptedNotification($event->bookRequest));
    }
}
