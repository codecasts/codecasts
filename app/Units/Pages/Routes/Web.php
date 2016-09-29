<?php

namespace Codecasts\Units\Pages\Routes;

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
        // Support page
        $this->router->get('support', ['as' => 'support', 'uses' => 'PagesController@support']);

        // Policy
        $this->router->get('policy', ['as' => 'policy', 'uses' => 'PagesController@policy']);

        // Statistics
        $this->router->get('statistics', ['as' => 'statistics', 'uses' => 'PagesController@statistics']);

    }
}
