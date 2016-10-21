<?php

namespace Codecasts\Domains\Lessons\Transformers;

use Codecasts\Domains\Lessons\Track;
use League\Fractal\TransformerAbstract;

class TrackTransformer extends TransformerAbstract
{
    public function transform(Track $track)
    {
        return [
            'id' => $track->id,
        ];
    }
}
