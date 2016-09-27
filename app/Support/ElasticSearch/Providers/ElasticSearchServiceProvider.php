<?php

namespace Codecasts\Support\ElasticSearch\Providers;

use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

/**
 * Class ElasticSearchServiceProvider.
 */
class ElasticSearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('elastic', function () {
            $hosts = [
                config('elastic.host'),
            ];

            $client = ClientBuilder::create()
                ->setHosts($hosts)
                ->build();

            return $client;
        });
    }
}
