<?php

namespace Codecasts\Domains\Lessons\Listeners;

use Codecasts\Domains\Lessons\Events\LessonPlayed;

class LogLessonPlayed
{
    public function handle(LessonPlayed $event)
    {
        if (app('auth')->check()) {
            $user_id = app('auth')->user()->id;

            $event->lesson->logs()->create([
                'user_id' => $user_id,
                'action' => 'play',
            ]);
        }
    }
}
