<?php

namespace Codecasts\Domains\Lessons\Transformers;

use Codecasts\Domains\Lessons\Lesson;
use League\Fractal\TransformerAbstract;

class LessonTransformer extends TransformerAbstract
{
    public function transform(Lesson $lesson)
    {
        return [
            'id' => $lesson->id,
        ];
    }
}
