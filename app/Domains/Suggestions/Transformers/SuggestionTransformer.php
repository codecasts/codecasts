<?php

namespace Codecasts\Domains\Suggestions\Transformers;

use Codecasts\Domains\Suggestions\Suggestion;
use League\Fractal\TransformerAbstract;

class SuggestionTransformer extends TransformerAbstract
{
    public function transform(Suggestion $suggestion)
    {
        return [
            'id' => $suggestion->id,
        ];
    }
}
