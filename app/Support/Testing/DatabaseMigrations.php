<?php

namespace Codecasts\Support\Testing;

use Illuminate\Contracts\Console\Kernel;

/**
 * Trait DatabaseMigrations.
 */
trait DatabaseMigrations
{
    /**
     * Define hooks to migrate the database before and after each test.
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
        $this->artisan('migrator');

        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrator:rollback');
        });
    }
}