<?php

use Codecasts\Support\Testing\DatabaseMigrations;

class HomeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_home_redirect_to_lessons()
    {
        $this->runDatabaseMigrations();

        $this->visit('/')
             ->see('Aulas');
    }
}
