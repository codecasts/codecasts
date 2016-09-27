<?php

namespace Codecasts\Domains\Suggestions\Transformers;

use League\Fractal\TransformerAbstract;
use Codecasts\Domains\Suggestions\Suggestion;

class SuggestionTransformer extends TransformerAbstract
{
    public function transform(Suggestion $suggestion)
    {
        return [
            'id' => $suggestion->id,
        ];
    }
}
