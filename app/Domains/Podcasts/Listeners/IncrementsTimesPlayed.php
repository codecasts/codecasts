<?php

namespace Codecasts\Domains\Podcasts\Listeners;

use Codecasts\Domains\Podcasts\Events\PodcastPlayed;

class IncrementsTimesPlayed
{
    public function handle(PodcastPlayed $event)
    {
        $podcast = $event->podcast;

        $podcast->times_played++;
        $podcast->save();
    }
}
