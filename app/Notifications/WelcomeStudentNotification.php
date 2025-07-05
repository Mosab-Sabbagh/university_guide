<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeStudentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('مرحبًا بك في منصتنا التعليمية 🎓')
            ->greeting('أهلاً ' . $notifiable->name)
            ->line('سعداء بانضمامك إلينا!')
            ->line('نتمنى لك تجربة تعليمية موفقة ومليئة بالنجاح.')
            ->action('زيارة المنصة', url('/'))
            ->line('شكراً لاستخدامك منصتنا.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'مرحبًا بك في منصتنا التعليمية 🎓',
            'message' => 'أهلاً ' . $notifiable->name . ', سعداء بانضمامك إلينا! نتمنى لك تجربة تعليمية موفقة ومليئة بالنجاح.',
            'url' => url('/'),
        ];
    }
}
