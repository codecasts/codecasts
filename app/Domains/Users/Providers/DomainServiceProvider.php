<?php

namespace Codecasts\Domains\Users\Providers;

use Codecasts\Domains\Users\Database\Migrations\AlterGuestsOnUsersTable;
use Codecasts\Domains\Users\Database\Migrations\CreateOauthIdentitiesTable;
use Codecasts\Support\Domain\ServiceProvider;
use Codecasts\Domains\Users\Database\Factories\UserFactory;
use Codecasts\Domains\Users\Database\Migrations\CreateUsersTable;
use Codecasts\Domains\Users\Database\Seeders\UsersSeeder;
use Codecasts\Domains\Users\Contracts;
use Codecasts\Domains\Users\Repositories;

/**
 * Class DomainServiceProvider.
 *
 * Register Users Domain Resources and Services
 */
class DomainServiceProvider extends ServiceProvider
{
    /**
     * @var string Domain "alias"
     */
    protected $alias = 'users';

    /**
     * @var bool Enable translations
     */
    protected $hasTranslations = true;

    /**
     * @var array Providers registered within the domain
     */
    protected $subProviders = [
        EventServiceProvider::class,
    ];

    /**
     * @var array Bind contracts to implementations
     */
    protected $bindings = [
        Contracts\UserRepository::class => Repositories\UserRepository::class,
    ];

    /**
     * @var array Migrations of this domains
     */
    protected $migrations = [
        CreateUsersTable::class,
        AlterGuestsOnUsersTable::class,
        CreateOauthIdentitiesTable::class,
    ];

    /**
     * @var array Some Seeders
     */
    protected $seeders = [
        UsersSeeder::class,
    ];

    /**
     * @var array Model factories
     */
    protected $factories = [
        UserFactory::class,
    ];
}
