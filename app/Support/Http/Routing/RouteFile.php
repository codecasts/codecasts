<?php

namespace Codecasts\Support\Http\Routing;

use Illuminate\Routing\Router;

/**
 * Class RouteFile.
 */
abstract class RouteFile
{
    /**
     * @var Router
     */
    protected $router;

    /**
     * @var array
     */
    protected $options;

    public function __construct(array $options)
    {
        $this->router = app('router');
        $this->options = $options;
    }

    /**
     * Register Routes.
     */
    public function register()
    {
        $this->router->group($this->options, function () {
            $this->routes();
        });
    }

    /**
     * Define routes.
     *
     * @return mixed
     */
    abstract public function routes();
}
