<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateOrderStatusEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $inprogress;
    public $completed;
    public $deliveries;
    public $play_sound;
    public function __construct($inprogress, $completed, $deliveries,$play_sound)
    {
        $this->inprogress = $inprogress;
        $this->completed  = $completed;
        $this->deliveries  = $deliveries;
        $this->play_sound  = $play_sound;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new channel('order-status');
    }

    public function broadcastAs()
    {
        return "UpdateOrderStatusEvent";
    }
}
