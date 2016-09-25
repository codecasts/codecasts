<?php

namespace Codecasts\Domains\Podcasts\Listeners;

use Codecasts\Domains\Podcasts\Events\PodcastDownloaded;

class IncrementsTimesDownloaded
{
    public function handle(PodcastDownloaded $event)
    {
        $podcast = $event->podcast;

        $timesDownloaded = $podcast->times_downloaded;
        ++$timesDownloaded;
        $podcast->times_downloaded = $timesDownloaded;
        $podcast->save();
    }
}
