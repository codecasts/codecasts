<?php

namespace Codecasts\Units\Podcasts\Providers;

use Codecasts\Units\Podcasts\Routes\Api;
use Codecasts\Units\Podcasts\Routes\Console;
use Codecasts\Units\Podcasts\Routes\Web;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Codecasts\Units\Podcasts\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        $this->mapConsoleRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes()
    {
        (new Web([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
            'prefix'     => 'podcast',
        ]))->register();
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes()
    {
        (new Api([
            'middleware' => 'api',
            'namespace'  => $this->namespace,
            'prefix'     => 'api',
        ]))->register();
    }

    /**
     * Define the "console" routes for the application.
     *
     * Those routes are the ones defined by
     * artisan->command instead of registered directly
     * on the ConsoleKernel.
     */
    protected function mapConsoleRoutes()
    {
        (new Console())->register();
    }
}
