<?php

namespace Codecasts\Domains\Lessons\Providers;

use Codecasts\Domains\Lessons\Contracts\LessonRepository as LessonRepositoryContract;
use Codecasts\Domains\Lessons\Contracts\TrackRepository as TrackRepositoryContract;
use Codecasts\Domains\Lessons\Database\Factories\LessonFactory;
use Codecasts\Domains\Lessons\Database\Factories\TrackFactory;
use Codecasts\Domains\Lessons\Database\Migrations\CreateLessonLogsTable;
use Codecasts\Domains\Lessons\Database\Migrations\CreateLessonsTable;
use Codecasts\Domains\Lessons\Database\Migrations\CreateLessonsTagsTable;
use Codecasts\Domains\Lessons\Database\Migrations\CreateTracksTable;
use Codecasts\Domains\Lessons\Repositories\LessonRepository;
use Codecasts\Domains\Lessons\Repositories\TrackRepository;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'lesson';

    protected $hasTranslations = true;

    protected $migrations = [
        CreateLessonsTable::class,
        CreateTracksTable::class,
        CreateLessonsTagsTable::class,
        CreateLessonLogsTable::class,
    ];

    protected $bindings = [
        LessonRepositoryContract::class => LessonRepository::class,
        TrackRepositoryContract::class => TrackRepository::class,
    ];

    protected $subProviders = [
        EventServiceProvider::class,
    ];

    protected $factories = [
        LessonFactory::class,
        TrackFactory::class,
    ];
}
