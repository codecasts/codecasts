<?php

namespace Codecasts\Domains\Lessons\Transformers;

use League\Fractal\TransformerAbstract;
use Codecasts\Domains\Lessons\Lesson;

class LessonTransformer extends TransformerAbstract
{
    public function transform(Lesson $lesson)
    {
        return [
            'id' => $lesson->id,
        ];
    }
}
