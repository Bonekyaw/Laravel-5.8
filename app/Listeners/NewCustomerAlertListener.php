<?php

namespace App\Listeners;

class NewCustomerAlertListener
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
