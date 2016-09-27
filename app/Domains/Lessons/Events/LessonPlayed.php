<?php

namespace Codecasts\Domains\Lessons\Events;

use Codecasts\Domains\Lessons\Lesson;
use Illuminate\Queue\SerializesModels;

class LessonPlayed
{
    use SerializesModels;

    public $lesson;

    /**
     * LessonPlayed constructor.
     *
     * @param Lesson $lesson
     */
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }
}
