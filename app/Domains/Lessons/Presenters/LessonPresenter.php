<?php

namespace Codecasts\Domains\Lessons\Presenters;

use Codecasts\Support\Helpers\TimeHelper;
use Codecasts\Support\ViewPresenter\Presenter;

class LessonPresenter extends Presenter
{
    public function length()
    {
        $helper = new TimeHelper($this->entity->length);

        return $helper->toHoursMinutesAndSeconds();
    }

    public function level()
    {
        return ucfirst(trans('lesson::lesson.level_'.$this->entity->level));
    }
}
