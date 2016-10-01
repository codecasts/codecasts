<?php

namespace Codecasts\Domains\Users\Database\Seeders;

use Codecasts\Domains\Users\User;
use Illuminate\Database\Seeder;

/**
 * Class UsersSeeders.
 */
class UsersSeeder extends Seeder
{
    /**
     * @todo improve users seeders
     */
    public function run()
    {
        factory(User::class)->times(10)->create();
    }
}
