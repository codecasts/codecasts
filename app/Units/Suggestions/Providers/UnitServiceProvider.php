<?php

namespace Codecasts\Units\Suggestions\Providers;

use Codecasts\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'suggestions';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $providers = [
        RouteServiceProvider::class,
    ];
}
