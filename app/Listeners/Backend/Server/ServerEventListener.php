<?php

namespace App\Listeners\Backend\Server;

use App\Events\Backend\Server\ServerCreated;
use App\Events\Backend\Server\ServerDestroyEvent;
use App\Events\Backend\Server\ServerUpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ServerEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event){
        logger('New Server Created.');
    }

    /**
     * @param $event
     */
    public function onUpdated($event){
        logger('Server Updated.');
    }

    /**
     * @param $event
     */
    public function onDeleted($event){
        logger('Server Deleted.');
    }

    /**
     * @param $event
     */
    public function subscribe($event){
        $event->listen(ServerCreated::class, 'App\Listeners\Backend\Server\ServerEventListener@onCreated');
        $event->listen(ServerUpdateEvent::class, 'App\Listeners\Backend\Server\ServerEventListener@onUpdated');
        $event->listen(ServerDestroyEvent::class, 'App\Listeners\Backend\Server\ServerEventListener@onDeleted');
    }
}
