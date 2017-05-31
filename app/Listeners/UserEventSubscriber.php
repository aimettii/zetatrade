<?php

namespace App\Listeners;

use App\Notifications\UserLogin;
use App\Notifications\UserLogout;
use Illuminate\Support\Facades\Auth;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {
//        Auth::user()->notify(new UserLogin());
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) {
//        Auth::user()->notify(new UserLogout());
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\User\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'App\Events\User\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }

}