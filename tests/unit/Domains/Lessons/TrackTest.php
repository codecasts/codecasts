<?php

namespace Codecasts\Domains\Lessons;

class TrackTest extends \TestCase
{
    /** @test */
    public function it_gets_the_first_lesson_slug()
    {
        $track = factory(Track::class)->make();

        $lessons = factory(Lesson::class, 2)->make();

        $track->setRelation('lessons', $lessons);

        $this->assertEquals($lessons[0]->slug, $track->firstLessonSlug());
    }

    /** @test */
    public function it_counts_lessons()
    {
        $track = factory(Track::class)->make();

        $lessons = factory(Lesson::class, 2)->make();

        $track->setRelation('lessons', $lessons);

        $this->assertEquals(2, $track->lessonCount());
    }
}
