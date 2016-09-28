<?php

namespace Codecasts\Domains\Tags\Transformers;

use Codecasts\Domains\Tags\Tag;
use League\Fractal\TransformerAbstract;

class TagTransformer extends TransformerAbstract
{
    public function transform(Tag $Tag)
    {
        return [
            'id' => $Tag->id,
        ];
    }
}
