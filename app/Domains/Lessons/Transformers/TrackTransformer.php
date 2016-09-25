<?php

namespace Codecasts\Domains\Lessons\Transformers;

use League\Fractal\TransformerAbstract;
use Codecasts\Domains\Lessons\Track;

class TrackTransformer extends TransformerAbstract
{
    public function transform(Track $track)
    {
        return [
            'id' => $track->id,
        ];
    }
}
