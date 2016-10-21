<?php

namespace Codecasts\Units\Panel\Routes;

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
        $this->router->get('cache-clear', ['as' => 'panel.cache.clear', 'uses' => 'UtilsController@cacheClear']);
        $this->router->get('dashboard', ['as' => 'panel.dashboard', 'uses' => 'DashboardController@dashboard']);
        $this->router->resource('lesson/serie', 'Lesson\SerieController', ['as' => 'panel.lesson']);
        $this->router->resource('lesson', 'Lesson\LessonController', ['as' => 'panel']);
    }
}
