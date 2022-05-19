<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RealTimeMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public  $message;
    public $count;
    public $admin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($status,$userUnreadNotifications,$admin)
    {
          $this->message=$status;
          $this->count=$userUnreadNotifications;
          $this->admin=$admin;


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat-notification.'.$this->message->user_id);
    }




}
