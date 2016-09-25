<?php

namespace Codecasts\Domains\Lessons;

use Codecasts\Domains\Users\User;
use Illuminate\Database\Eloquent\Model;

class LessonLog extends Model
{
    protected $table = 'lesson_logs';

    protected $fillable = [
        'lesson_id',
        'user_id',
        'action',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
