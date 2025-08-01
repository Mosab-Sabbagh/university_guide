<?php

namespace App\Listeners;

use App\Events\BookRequestAccepted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdatePostStatus
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
        // Update the book post status to 'closed' when a request is accepted
        $bookPost = $event->bookRequest->bookPost;
        if ($bookPost) {
            $bookPost->status = 'closed';
            $bookPost->save();
        }
    }
}
