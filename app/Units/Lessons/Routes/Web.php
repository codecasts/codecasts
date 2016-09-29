<?php

namespace Codecasts\Units\Lessons\Routes;

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
        $this->trackRoutes();
        $this->lessonRoutes();
    }

    protected function trackRoutes()
    {
        // Tracks
        $this->router->get('series', ['as' => 'lesson.track.index', 'uses' => 'TrackController@index']);
        $this->router->get('series/{slug}', ['as' => 'track.show', 'uses' => 'TrackController@show']);
    }

    protected function lessonRoutes()
    {
        // Main Redirect
        $this->router->get('', function () {
            return redirect(route('lesson.index'));
        });

        // Lessons
        $this->router->get('lesson', ['as' => 'lesson.index', 'uses' => 'LessonController@index']);
        $this->router->get('lesson/{slug}', ['as' => 'lesson.show', 'uses' => 'LessonController@show']);
        $this->router->get('lesson/play/{id}', ['as' => 'lesson.play', 'uses' => 'LessonController@play']);
        $this->router->get('lesson/download/{id}', ['as' => 'lesson.download', 'uses' => 'LessonController@download']);
        $this->router->get('lesson/thumb/{id}', ['as' => 'lesson.thumb', 'uses' => 'LessonController@thumb']);
    }
}
