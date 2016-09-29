<?php

namespace Codecasts\Units\Suggestions\Routes;

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
        $this->router->resource('suggestion', 'SuggestionsController', ['except' => ['destroy', 'update', 'edit', 'show']]);

        $this->router->get('suggestion/{id}/votes/sync', ['as' => 'suggestion.sync', 'uses' => 'VotesController@sync']);
        $this->router->get('suggestion/votes/user', ['as' => 'suggestion.votes.user', 'uses' => 'VotesController@userVotes']);
    }
}
