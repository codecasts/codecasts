<?php

namespace Codecasts\Domains\Lessons\Listeners;

use Codecasts\Domains\Lessons\Events\LessonDownloaded;

class IncrementsTimesDownloaded
{
    public function handle(LessonDownloaded $event)
    {
        $lesson = $event->lesson;

        $timesDownloaded = $lesson->times_downloaded;
        ++$timesDownloaded;
        $lesson->times_downloaded = $timesDownloaded;
        $lesson->save();
    }
}
