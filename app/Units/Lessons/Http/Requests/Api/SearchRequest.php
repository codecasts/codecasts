<?php

namespace Codecasts\Units\Lessons\Http\Requests\Api;

use Codecasts\Support\Http\Request;

/**
 * Class SearchRequest.
 */
class SearchRequest extends Request
{
    public function rules()
    {
        return [
            'term' => 'required|min:3',
        ];
    }
}