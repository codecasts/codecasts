<?php

namespace Codecasts\Domains\Podcasts\Events;

use Codecasts\Domains\Podcasts\Podcast;
use Illuminate\Queue\SerializesModels;

class PodcastPlayed
{
    use SerializesModels;

    public $podcast;

    /**
     * PodcastPlayed constructor.
     *
     * @param Podcast $podcast
     */
    public function __construct(Podcast $podcast)
    {
        $this->podcast = $podcast;
    }
}
