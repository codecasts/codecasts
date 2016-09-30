<?php

namespace Codecasts\Support\Localization;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

/**
 * Class LocalizationServiceProvider.
 */
class LocalizationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Carbon::setLocale(app()->getLocale());
    }
}