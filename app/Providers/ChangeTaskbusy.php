<?php

namespace App\Providers;

use App\Providers\DisconnectTaskbusy;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\ClearbusyJob;

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
       ClearbusyJob::dispatch($event->task)->delay(now()->addMinutes(1));
    }
}
