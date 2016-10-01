<?php

namespace Codecasts\Units\Lessons\Routes;

use Codecasts\Domains\Lessons\Contracts\LessonRepository;
use Codecasts\Domains\Lessons\Lesson;
use Codecasts\Support\Console\Routing\RouteFile;
use Codecasts\Support\ElasticSearch\Indexer;

/**
 * Console Routes.
 *
 * This file is where you may define all of your Closure based console
 * commands. Each Closure is bound to a command instance allowing a
 * simple approach to interacting with each command's IO methods.
 */
class Console extends RouteFile
{
    /**
     * Declare Console Routes.
     */
    public function routes()
    {
        $this->artisan->command('lessons:index', function () {
            // Inform what is going one
            $this->info('Indexing Lessons');

            // get the repository instance
            $lessonsRepository = app()->make(LessonRepository::class);

            // get all visible itens for indexing
            $lessons = $lessonsRepository->getVisible(false, false);

            // create a new indexer instance passing the collection and
            // the type to be indexed.
            $indexer = new Indexer($lessons, Lesson::class);

            // do index.
            $indexer->index();
        });
    }
}
