<?php

namespace Codecasts\Units\Auth\Routes;

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
        // Authentication routes.
        $this->authenticationRoutes();
    }

    protected function authenticationRoutes()
    {
        $this->router->get('login/{driver}', ['as' => 'auth.social.login', 'uses' => 'AuthController@social']);

        $this->router->get('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);

        $this->router->get('callback/{driver}', ['as' => 'auth.social.callback', 'uses' => 'AuthController@callback']);

        $this->router->get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);


    }
}
