<?php

namespace Codecasts\Domains\Tags\Providers;

use Codecasts\Domains\Tags\Database\Migrations\CreateTagsTable;
use Codecasts\Domains\Tags\Contracts\TagRepository as TagRepositoryContract;
use Codecasts\Domains\Tags\Repositories\TagRepository;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'tags';

    protected $bindings = [
        TagRepositoryContract::class => TagRepository::class,
    ];

    protected $migrations = [
        CreateTagsTable::class,
    ];
}
