<?php

namespace Codecasts\Domains\Lessons\Transformers;

use Codecasts\Domains\Lessons\Serie;
use League\Fractal\TransformerAbstract;

class SerieTransformer extends TransformerAbstract
{
    public function transform(Serie $serie)
    {
        return [
            'id' => $serie->id,
        ];
    }
}
