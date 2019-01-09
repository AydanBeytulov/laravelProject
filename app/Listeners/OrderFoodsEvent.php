<?php

namespace App\Listeners;

use App\Events\OrderFoods;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class OrderFoodsEvent
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  OrderFoods  $event
     * @return void
     */
    public function handle(OrderFoods $event)
    {
        //@TODO: Да направя тука нещо да се случва
        error_log('here3 '.$event->insertID );
    }
}
