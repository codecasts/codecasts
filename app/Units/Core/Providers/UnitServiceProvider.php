<?php

namespace App\Units\Core\Providers;

use Codecasts\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'core';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $providers = [
        BroadcastServiceProvider::class,
    ];
}
