<?php

namespace Codecasts\Domains\Lessons\Listeners;

use Codecasts\Domains\Lessons\Events\LessonPlayed;

class IncrementsTimesPlayed
{
    public function handle(LessonPlayed $event)
    {
        $lesson = $event->lesson;

        $lesson->times_played++;
        $lesson->save();
    }
}
