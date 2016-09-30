<?php

namespace Codecasts\Units\Panel\Http\Requests\Lesson;

use Codecasts\Support\Http\Request;

class NewLessonRequest extends Request
{
    public function rules()
    {
        return [
            'title'   =>  'required',
        ];
    }
}