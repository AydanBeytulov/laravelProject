<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\Controller as MainController;

class LoginEvent
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
     * @param  Login  $event
     * @return void
     */

    //@TODO : Listener, refresh user data after login
    public function handle(Login $event)
    {
        MainController::refreshLoadOnlyOnce("currentUserData");
    }
}