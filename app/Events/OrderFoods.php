<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class OrderFoods
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //@TODO: Event after user make order

    /**
     * Create a new event instance.
     *
     * @param integer
     * @return void
     */
    public function __construct($insertID)
    {
        $this->insertID = $insertID;

        //@TODO: check if order exist
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
