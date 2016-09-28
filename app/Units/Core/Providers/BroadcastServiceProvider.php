<?php

namespace Codecasts\Units\Core\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('App.Domains.Users.User.*', function ($user, $userId) {
            return (int) $user->id === (int) $userId;
        });
    }
}
