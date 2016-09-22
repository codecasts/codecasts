<?php

namespace App\Units\Home\Providers;

use Codecasts\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'home';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $providers = [
        RouteServiceProvider::class,
    ];
}
