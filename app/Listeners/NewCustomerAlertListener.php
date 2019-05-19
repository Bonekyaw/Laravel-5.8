<?php

namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCustomerAlertListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  NewCustomerEvent  $event
     * @return void
     */
    public function handle( $event)
    {
        dump('Wow new customer has registered, You know');
    }
}
