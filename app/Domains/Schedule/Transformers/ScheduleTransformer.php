<?php

namespace Codecasts\Domains\Schedule\Transformers;

use Codecasts\Domains\Schedule\Schedule;
use League\Fractal\TransformerAbstract;

class ScheduleTransformer extends TransformerAbstract
{
    public function transform(Schedule $schedule)
    {
        return [
            'id' => $schedule->id,
        ];
    }
}
