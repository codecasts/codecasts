<?php

namespace Codecasts\Domains\Lessons\Presenters;

use Codecasts\Support\Helpers\TimeHelper;
use Codecasts\Support\ViewPresenter\Presenter;

class TrackPresenter extends Presenter
{
    public function length()
    {
        $secLabel = trans('lessons::time.sec');
        $minLabel = trans('lessons::time.min');

        $length = $this->entity->lessons()->sum('length');

        $helper = new TimeHelper($length);

        return $helper->toHoursAndMinutes();
    }
}
