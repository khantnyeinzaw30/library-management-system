<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookOverdueNotification extends Notification
{
    use Queueable;

    public $issuedBook;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($issuedBook)
    {
        $this->issuedBook = $issuedBook;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'fine' => $this->issuedBook->fine,
            'bookTitle' => $this->issuedBook->book->title,
            'dueDate' => Carbon::parse($this->issuedBook->due_date)->format('M d Y')
        ];
    }
}
