<?php

namespace App\Notifications;

use App\Models\comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sendNotification extends Notification implements ShouldBroadcast , ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $comment ;
    public function __construct(comment $comment)
    {
        $this->comment = $comment ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'comment' => $this->comment->contenu,
            'formation_title' => optional($this->comment->formation)->nome,
            'event_title'=> optional($this->comment->event)->titre,
            'contenu' => $this->comment->contenu,
            'user' => $this->comment->user->name
        ];
    }

    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'comment' => $this->comment->id,
            'formation_title' => optional($this->comment->formation)->nome,
            'event_title'=> optional($this->comment->event)->titre,
            'contenu' => $this->comment->contenu,
            'user' => $this->comment->user->name
        ]);
    }
}
