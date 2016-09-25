<?php

namespace Codecasts\Domains\Podcasts\Providers;

use Codecasts\Domains\Podcasts\Events\PodcastDownloaded;
use Codecasts\Domains\Podcasts\Events\PodcastPlayed;
use Codecasts\Domains\Podcasts\Listeners\IncrementsTimesDownloaded;
use Codecasts\Domains\Podcasts\Listeners\IncrementsTimesPlayed;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        PodcastPlayed::class => [
            IncrementsTimesPlayed::class,
        ],
        PodcastDownloaded::class => [
            IncrementsTimesDownloaded::class,
        ],
    ];
}
