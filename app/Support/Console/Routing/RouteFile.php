<?php

namespace Codecasts\Support\Console\Routing;

use Illuminate\Contracts\Console\Kernel;

/**
 * Class RouteFile.
 */
abstract class RouteFile
{
    /**
     * @var Kernel
     */
    protected $artisan;

    /**
     * @var Kernel
     */
    protected $router;

    /**
     * RouteFile constructor.
     */
    public function __construct()
    {
        $this->artisan = app(Kernel::class);
        $this->router = $this->artisan;
    }

    /**
     * Register Console Routes.
     */
    public function register()
    {
        $this->routes();
    }

    /**
     * Declare console routes.
     */
    abstract public function routes();
}
