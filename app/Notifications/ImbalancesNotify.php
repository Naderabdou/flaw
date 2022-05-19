<?php

namespace App\Notifications;

use App\Models\Imbalance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class ImbalancesNotify extends Notification
{
    use Queueable;
    public $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Imbalance $imbalance)
    {
        $this->status=$imbalance;
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

            'admin'=>auth()->user()->name,
            'id'=>$this->status->id,
            'name_imbalance'=>$this->status->bug_name,
            'status'=>$this->status->status
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'admin'=>auth()->user()->name,
            'imbalances_id'=>$this->status->id,
            'name_imbalance'=>$this->status->bug_name,
            'status'=>$this->status->status,
            'count'=>$notifiable->unreadNotifications()->count(),


        ]);


    }
}
