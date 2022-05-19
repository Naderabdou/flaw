<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddImbalances implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $imbalances;
    public $count;
    public $user;
    public $admin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($imbalances,$userUnreadNotifications,$name_user,$admin_id)

    {
        $this->imbalances=$imbalances;
        $this->count=$userUnreadNotifications;
        $this->user=$name_user;
        $this->admin=$admin_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('Add-imbalance.'.$this->admin);
    }
}
