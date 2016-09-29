<?php

namespace Codecasts\Support\Subscription;

use Illuminate\Support\ServiceProvider;

/**
 * Class SubscriptionServiceProvider.
 */
class SubscriptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        \Iugu::setApiKey(config('services.iugu.api_token'));
    }
}
