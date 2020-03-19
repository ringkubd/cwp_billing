<?php

namespace App\Listeners\Backend\Auth\Permission;

use App\Events\Backend\Auth\Permission\PermissionCreateEvent;
use App\Events\Backend\Auth\Permission\PermissionDeleteEvent;
use App\Events\Backend\Auth\Permission\PermissionUpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PermissionEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        logger('Permission Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        logger('Permission Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        logger('Permission Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            PermissionCreateEvent::class,
            'App\Listeners\Backend\Auth\Permission\PermissionEventListener@onCreated'
        );

        $events->listen(
            PermissionUpdateEvent::class,
            'App\Listeners\Backend\Auth\Permission\PermissionEventListener@onUpdated'
        );

        $events->listen(
            PermissionDeleteEvent::class,
            'App\Listeners\Backend\Auth\Permission\PermissionEventListener@onDeleted'
        );
    }
}
