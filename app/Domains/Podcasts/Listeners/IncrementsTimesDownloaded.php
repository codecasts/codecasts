<?php

namespace Codecasts\Domains\Podcasts\Listeners;

use Codecasts\Domains\Podcasts\Events\PodcastDownloaded;

class IncrementsTimesDownloaded
{
    public function handle(PodcastDownloaded $event)
    {
        $podcast = $event->podcast;

        $podcast->times_downloaded++;
        $podcast->save();
    }
}
