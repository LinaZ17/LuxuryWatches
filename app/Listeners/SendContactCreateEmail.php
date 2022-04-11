<?php

namespace App\Listeners;

use App\Events\ContactCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendContactCreateEmail
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
     * @param  \App\Events\ContactCreate  $event
     * @return void
     */
    public function handle(ContactCreate $event)
    {
        //
    }
}
