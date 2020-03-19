<?php

namespace App\Events\Backend\Server;

use App\Models\Server\ServerInformation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServerUpdateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $serverinformation;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ServerInformation $serverInformation)
    {
        $this->serverinformation = $serverInformation;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
