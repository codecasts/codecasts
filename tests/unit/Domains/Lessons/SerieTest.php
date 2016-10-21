<?php

namespace Codecasts\Domains\Lessons;

class TrackTest extends \TestCase
{
    /** @test */
    public function it_gets_the_first_lesson_slug()
    {
        $serie = factory(Serie::class)->make();

        $lessons = factory(Lesson::class, 2)->make();

        $serie->setRelation('lessons', $lessons);

        $this->assertEquals($lessons[0]->slug, $serie->firstLessonSlug());
    }

    /** @test */
    public function it_counts_lessons()
    {
        $serie = factory(Serie::class)->make();

        $lessons = factory(Lesson::class, 2)->make();

        $serie->setRelation('lessons', $lessons);

        $this->assertEquals(2, $serie->lessonCount());
    }
}
