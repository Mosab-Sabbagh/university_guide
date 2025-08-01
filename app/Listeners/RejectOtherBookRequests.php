<?php

namespace App\Listeners;

use App\Events\BookRequestAccepted;
use App\Models\BookRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RejectOtherBookRequests
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
        BookRequest::where('book_post_id', $event->bookRequest->book_post_id)
            ->where('id', '!=', $event->bookRequest->id)
            ->update(['status' => 'rejected']);
    }
}
