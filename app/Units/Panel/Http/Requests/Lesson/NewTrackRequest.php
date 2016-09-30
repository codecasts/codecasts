<?php

namespace Codecasts\Units\Panel\Http\Requests\Lesson;

use Codecasts\Support\Http\Request;

class NewTrackRequest extends Request
{
    public function rules()
    {
        return [
            'title' =>  'required',
            'description'   =>  'required',
            'visible'   =>  'required',
        ];
    }
}