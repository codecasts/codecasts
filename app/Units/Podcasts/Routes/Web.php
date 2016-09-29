<?php

namespace Codecasts\Units\Podcasts\Routes;

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
        // Podcasts
        $this->router->get('', ['as' => 'podcast.index', 'uses' => 'PodcastController@index']);
        $this->router->get('{slug}', ['as' => 'podcast.show', 'uses' => 'PodcastController@show']);
        $this->router->get('play/{id}', ['as' => 'podcast.play', 'uses' => 'PodcastController@play']);
        $this->router->get('download/{id}', ['as' => 'podcast.download', 'uses' => 'PodcastController@download']);
        $this->router->get('thumb/{id}', ['as' => 'podcast.thumb', 'uses' => 'PodcastController@thumb']);
    }
}
