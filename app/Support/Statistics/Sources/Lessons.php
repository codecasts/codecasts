<?php

namespace Codecasts\Support\Statistics\Sources;

use Codecasts\Domains\Lessons\Repositories\LessonRepository;
use Codecasts\Domains\Lessons\Repositories\SerieRepository;
use Codecasts\Support\Helpers\TimeHelper;

class Lessons extends Source
{
    protected $key = 'lessons_stats';

    public function get()
    {
        return $this->response(function () {
            return $this->getHumanPublishedTime().' em '.$this->getLessonsCount().' aulas';
        });
    }

    public function getTime()
    {
        return $this->getHumanPublishedTime();
    }

    public function getCount()
    {
        return $this->getLessonsCount();
    }

    public function getSeries()
    {
        $serieRepository = new SerieRepository();

        return $serieRepository->getVisible(false, false)->count();
    }

    protected function getHumanPublishedTime()
    {
        $seconds = $this->getPublishedTimeInSeconds();

        return $this->convertSecondsToHumanTime($seconds);
    }

    protected function getLessonsCount()
    {
        $repo = new LessonRepository();

        return $repo->visibleCount();
    }

    protected function getPublishedTimeInSeconds()
    {
        $repo = new LessonRepository();

        return $repo->totalPublishedTime();
    }

    protected function convertSecondsToHumanTime($seconds)
    {
        $timeHelper = new TimeHelper($seconds);

        return $timeHelper->toHoursAndMinutes();
    }
}
