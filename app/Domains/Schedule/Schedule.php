<?php

namespace Codecasts\Domains\Schedule;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $dates = [
        'planed_date',
    ];

    protected $fillable = [
        'planed_date',
        'type',
        'title',
        'parent',
    ];
}
