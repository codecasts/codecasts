<?php

use Codecasts\Support\Testing\DatabaseMigrations;

class LessonTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_lessons_route_is_enabled()
    {
        $this->runDatabaseMigrations();

        $this->visit(route('lesson.index'))
             ->see('Aulas');
    }


    public function test_podcasts_are_being_listed()
    {
        $this->runDatabaseMigrations();

        factory(\Codecasts\Domains\Lessons\Lesson::class)->create([
            'title'   => 'lesson 1 title',
            'visible' => true,
        ]);
        factory(\Codecasts\Domains\Lessons\Lesson::class)->create([
            'title'   => 'lesson 2 title',
            'visible' => true,
        ]);

        $this->visit(route('lesson.index'))
            ->see('lesson 1 title')
            ->see('lesson 2 title');
    }


    public function test_lessons_can_be_hidden()
    {
        $this->runDatabaseMigrations();

        factory(\Codecasts\Domains\Lessons\Lesson::class)->create([
            'title'   => 'lesson 1 title',
            'visible' => true,
        ]);
        factory(\Codecasts\Domains\Lessons\Lesson::class)->create([
            'title'   => 'lesson 2 title',
            'visible' => false,
        ]);

        $this->visit(route('lesson.index'))
            ->see('lesson 1 title')
            ->dontSee('lesson 2 title');
    }


    public function test_lessons_can_be_found_by_slug()
    {
        $this->runDatabaseMigrations();

        factory(\Codecasts\Domains\Lessons\Lesson::class)->create([
            'title'   => 'lesson 1 title',
            'slug'    => 'lesson-1-title',
            'visible' => true,
        ]);

        $this->visit(route('lesson.show', ['lesson-1-title']))
            ->see('lesson 1 title');
    }
}
