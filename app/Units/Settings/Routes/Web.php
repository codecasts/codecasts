<?php

namespace Codecasts\Units\Settings\Routes;

use Codecasts\Support\Http\Routing\RouteFile;

/**
 * Web Routes.
 *
 * This file is where you may define all of the routes that are handled
 * by your application. Just tell Laravel the URIs it should respond
 * to using a Closure or controller method. Build something great!
 */
class Web extends RouteFile
{
    /**
     * Declare Web Routes.
     */
    public function routes()
    {
        // Profile
        $this->router->get('profile', ['as' => 'profile.edit', 'uses' => 'SettingsController@profile']);
        $this->router->put('profile', ['as' => 'profile.update', 'uses' => 'SettingsController@updateProfile']);

        // Subscription
        $this->router->resource('subscription', 'SubscriptionController');
    }
}
