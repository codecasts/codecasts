<?php


class ExampleTest extends TestCase
{
    use \Codecasts\Traits\DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->runDatabaseMigrations();

        $this->visit('/')
             ->see('Aulas');
    }
}
