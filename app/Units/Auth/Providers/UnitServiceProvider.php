<?php

namespace Codecasts\Units\Auth\Providers;

use Codecasts\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'auth';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $providers = [
        AuthServiceProvider::class,
        RouteServiceProvider::class,
    ];
}
