<?php

namespace Codecasts\Domains\Lessons\Providers;

use Codecasts\Domains\Lessons\Events\LessonDownloaded;
use Codecasts\Domains\Lessons\Events\LessonPlayed;
use Codecasts\Domains\Lessons\Listeners\IncrementsTimesDownloaded;
use Codecasts\Domains\Lessons\Listeners\IncrementsTimesPlayed;
use Codecasts\Domains\Lessons\Listeners\LogLessonDownloaded;
use Codecasts\Domains\Lessons\Listeners\LogLessonPlayed;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        LessonPlayed::class => [
            IncrementsTimesPlayed::class,
            LogLessonPlayed::class,
        ],
        LessonDownloaded::class => [
            IncrementsTimesDownloaded::class,
            LogLessonDownloaded::class,
        ],
    ];
}
