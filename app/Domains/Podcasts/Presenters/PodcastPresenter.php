<?php

namespace Codecasts\Domains\Podcasts\Presenters;

use Codecasts\Support\Helpers\TimeHelper;
use Codecasts\Support\ViewPresenter\Presenter;

class PodcastPresenter extends Presenter
{
    public function length()
    {
        $helper = new TimeHelper($this->entity->length);

        return $helper->toHoursMinutesAndSeconds();
    }
}
