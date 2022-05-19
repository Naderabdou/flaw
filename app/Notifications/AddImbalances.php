<?php

namespace App\Notifications;

use App\Models\Imbalance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class AddImbalances extends Notification implements ShouldBroadcast
{
    use Queueable;
    public $imbalances;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Imbalance $imbalances)

    {
        $this->imbalances=$imbalances;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
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
            'id'=>$this->imbalances->id,
            'name_bug'=>$this->imbalances->bug_name,
            'statues'=>$this->imbalances->status,
            'user'=>auth()->user()->name,
            'user_id'=>$this->imbalances->user_id,
        ];
    }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'=>$this->imbalances->id,
            'name_bug'=>$this->imbalances->bug_name,
            'statues'=>$this->imbalances->status,
            'user'=>auth()->user()->name,
            'user_id'=>$this->imbalances->user_id,
            'count'=>$notifiable->unreadNotifications()->count(),


        ]);

    }
}
