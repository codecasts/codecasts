<?php

namespace Codecasts\Domains\Podcasts\Listeners;

use Codecasts\Domains\Podcasts\Events\PodcastPlayed;

class IncrementsTimesPlayed
{
    public function handle(PodcastPlayed $event)
    {
        $podcast = $event->podcast;

        $timesPlayed = $podcast->times_played;
        ++$timesPlayed;
        $podcast->times_played = $timesPlayed;
        $podcast->save();
    }
}
