<?php

namespace Codecasts\Units\Webhooks\Providers;

use Codecasts\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'webhooks';

    protected $hasViews = false;

    protected $hasTranslations = false;

    protected $providers = [
        RouteServiceProvider::class,
    ];
}
