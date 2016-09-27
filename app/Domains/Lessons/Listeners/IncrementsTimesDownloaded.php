<?php

namespace Codecasts\Domains\Lessons\Listeners;

use Codecasts\Domains\Lessons\Events\LessonDownloaded;

class IncrementsTimesDownloaded
{
    public function handle(LessonDownloaded $event)
    {
        $lesson = $event->lesson;

        $lesson->times_downloaded++;
        $lesson->save();
    }
}
