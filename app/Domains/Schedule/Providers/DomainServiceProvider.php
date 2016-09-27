<?php

namespace Codecasts\Domains\Schedule\Providers;

use Codecasts\Domains\Schedule\Database\Migrations\CreateScheduleTable;
use Codecasts\Domains\Schedule\Contracts\ScheduleRepository as ScheduleRepositoryContract;
use Codecasts\Domains\Schedule\Repositories\ScheduleRepository;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'schedule';

    protected $bindings = [
        ScheduleRepositoryContract::class => ScheduleRepository::class,
    ];

    protected $migrations = [
        CreateScheduleTable::class,
    ];
}
