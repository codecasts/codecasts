<?php

namespace Codecasts\Domains\Lessons\Listeners;

use Codecasts\Domains\Lessons\Events\LessonDownloaded;

class LogLessonDownloaded
{
    public function handle(LessonDownloaded $event)
    {
        if (app('auth')->check()) {
            $user_id = app('auth')->user()->id;

            $event->lesson->logs()->create([
                'user_id' => $user_id,
                'action'  => 'download',
            ]);
        }
    }
}
