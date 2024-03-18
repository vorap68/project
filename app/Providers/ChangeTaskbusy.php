<?php

namespace App\Providers;

use App\Providers\DisconnectTaskbusy;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeTaskbusy
{
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
     * @param  \App\Providers\DisconnectTaskbusy  $event
     * @return void
     */
    public function handle(DisconnectTaskbusy $event)
    {
        dump($event->task->updated_at);
    }
}
