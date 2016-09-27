<?php

namespace Codecasts\Domains\Tags\Transformers;

use League\Fractal\TransformerAbstract;
use Codecasts\Domains\Tags\Tag;

class TagTransformer extends TransformerAbstract
{
    public function transform(Tag $Tag)
    {
        return [
            'id' => $Tag->id,
        ];
    }
}
