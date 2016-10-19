<?php

namespace Codecasts\Domains\Lessons\Providers;

use Codecasts\Domains\Lessons\Contracts\LessonRepository as LessonRepositoryContract;
use Codecasts\Domains\Lessons\Contracts\SerieRepository as SerieRepositoryContract;
use Codecasts\Domains\Lessons\Database\Factories\LessonFactory;
use Codecasts\Domains\Lessons\Database\Factories\SerieFactory;
use Codecasts\Domains\Lessons\Database\Migrations\CreateLessonLogsTable;
use Codecasts\Domains\Lessons\Database\Migrations\CreateLessonsTable;
use Codecasts\Domains\Lessons\Database\Migrations\CreateLessonsTagsTable;
use Codecasts\Domains\Lessons\Database\Migrations\CreateSeriesTable;
use Codecasts\Domains\Lessons\Repositories\LessonRepository;
use Codecasts\Domains\Lessons\Repositories\SerieRepository;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'lesson';

    protected $hasTranslations = true;

    protected $migrations = [
        CreateLessonsTable::class,
        CreateSeriesTable::class,
        CreateLessonsTagsTable::class,
        CreateLessonLogsTable::class,
    ];

    protected $bindings = [
        LessonRepositoryContract::class => LessonRepository::class,
        SerieRepositoryContract::class  => SerieRepository::class,
    ];

    protected $subProviders = [
        EventServiceProvider::class,
    ];

    protected $factories = [
        LessonFactory::class,
        SerieFactory::class,
    ];
}
