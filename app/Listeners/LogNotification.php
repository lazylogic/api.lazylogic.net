<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Queue\InteractsWithQueue;
use Lazylogic\Additive\Logging;

class LogNotification
{
    use Logging;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificationSent  $event
     * @return void
     */
    public function handle( NotificationSent $event )
    {
        $this->debug( '$event->channel', $event->channel );
        $this->debug( '$event->notifiable', $event->notifiable );
        $this->debug( '$event->notification', $event->notification );
        $this->debug( '$event->response', $event->response );
    }
}