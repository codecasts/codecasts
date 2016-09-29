<?php

use Codecasts\Support\Testing\DatabaseMigrations;

class PodcastTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_podcasts_route_is_enabled()
    {
        $this->runDatabaseMigrations();

        $this->visit(route('podcast.index'))
             ->see('podcasts');
    }

    public function test_podcasts_are_being_listed()
    {
        $this->runDatabaseMigrations();

        factory(\Codecasts\Domains\Podcasts\Podcast::class)->create([
            'title'   => 'podcast 1 title',
            'visible' => true,
        ]);
        factory(\Codecasts\Domains\Podcasts\Podcast::class)->create([
            'title'   => 'podcast 2 title',
            'visible' => true,
        ]);

        $this->visit(route('podcast.index'))
            ->see('podcast 1 title')
            ->see('podcast 2 title');
    }

    public function test_podcasts_can_be_hidden()
    {
        $this->runDatabaseMigrations();

        factory(\Codecasts\Domains\Podcasts\Podcast::class)->create([
            'title'   => 'podcast 1 title',
            'visible' => true,
        ]);
        factory(\Codecasts\Domains\Podcasts\Podcast::class)->create([
            'title'   => 'podcast 2 title',
            'visible' => false,
        ]);

        $this->visit(route('podcast.index'))
            ->see('podcast 1 title')
            ->dontSee('podcast 2 title');
    }

    public function test_podcast_can_be_found_by_slug()
    {
        $this->runDatabaseMigrations();

        factory(\Codecasts\Domains\Podcasts\Podcast::class)->create([
            'title'   => 'podcast 1 title',
            'slug'    => 'podcast-1-title',
            'visible' => true,
        ]);

        $this->visit(route('podcast.show', ['podcast-1-title']))
            ->see('podcast 1 title');
    }
}
