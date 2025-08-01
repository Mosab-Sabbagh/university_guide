<?php

namespace App\Notifications;

use App\Models\BookRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Support\Facades\Log;

class RequestAcceptedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $bookRequest;
    public function __construct($bookRequest)
    {
        $this->bookRequest = $bookRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    protected function getNotificationData(): array
    {
        return [
            'title' => 'قبول طلب كتاب',
            'message' => 'تم قبول طلبك للحصول على الكتاب: ' . $this->bookRequest->bookPost->title,
            'url' => url('/student/book-request/myRequests/' . $this->bookRequest->user->id),
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $data = $this->getNotificationData();

        return (new MailMessage)
            ->subject($data['title'])
            ->line($data['message'])
            ->action('عرض الطلب', $data['url'])
            ->line('شكراً لاستخدامك منصتنا!');
    }

    public function toDatabase($notifiable): array
    {
        return $this->getNotificationData();
    }




}
