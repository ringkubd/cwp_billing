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

class ServerCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $serverInformation;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ServerInformation $information)
    {
        $this->serverInformation = $information;
    }

}
