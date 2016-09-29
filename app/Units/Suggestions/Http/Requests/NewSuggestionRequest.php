<?php

namespace Codecasts\Units\Suggestions\Http\Requests;

use Codecasts\Support\Http\Request;

class NewSuggestionRequest extends Request
{
    public function rules()
    {
        return [
            'suggestion' => 'required|min:10',
        ];
    }
}
