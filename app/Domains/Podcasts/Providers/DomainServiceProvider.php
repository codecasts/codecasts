<?php

namespace Codecasts\Domains\Podcasts\Providers;

use Codecasts\Domains\Podcasts\Contracts\PodcastRepository as PodcastRepositoryContract;
use Codecasts\Domains\Podcasts\Database\Migrations\CreatePodcastsTable;
use Codecasts\Domains\Podcasts\Repositories\PodcastRepository;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'podcasts';

    protected $hasTranslations = true;

    protected $migrations = [
        CreatePodcastsTable::class,
    ];

    protected $bindings = [
        PodcastRepositoryContract::class => PodcastRepository::class,
    ];

    protected $subProviders = [
        EventServiceProvider::class,
    ];
}
