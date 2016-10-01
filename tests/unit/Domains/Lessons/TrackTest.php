<?php

namespace Codecasts\Domains\Lessons;

use Codecasts\Domains\Lessons\Lesson;
use Codecasts\Domains\Lessons\Track;

class TrackTest extends \TestCase
{
    /** @test */
    public function it_gets_the_first_lesson_slug()
    {
        $track = factory(Track::class)->make();

        $lessons = collect([
            factory(Lesson::class)->make(),
            factory(Lesson::class)->make(),
        ]);

        $track->setRelation('lessons', $lessons);

        $this->assertEquals($lessons[0]->slug, $track->firstLessonSlug());
    }

    /** @test */
    public function it_counts_lessons()
    {
        $track = factory(Track::class)->make();

        $lessons = collect([
            factory(Lesson::class)->make(),
            factory(Lesson::class)->make(),
        ]);

        $track->setRelation('lessons', $lessons);

        $this->assertEquals(2, $track->lessonCount());
    }
}
