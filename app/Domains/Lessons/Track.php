<?php

namespace Codecasts\Domains\Lessons;

use Codecasts\Domains\Lessons\Presenters\TrackPresenter;
use Codecasts\Support\ViewPresenter\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Track extends Model
{
    use SoftDeletes, Presentable;

    protected $table = 'tracks';

    protected $fillable = [
        'title',
        'description',
        'visible',
        'slug',
    ];

    //protected $casts = [
    //    'visible' =>  'boolean',
    //];

    protected $presenter = TrackPresenter::class;

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'track_id');
    }

    public function firstLessonSlug()
    {
        $lesson = $this->lessons()->first();

        return ($lesson) ? $lesson->slug : null;
    }

    public function lessonCount()
    {
        $lessons_count = $this->lessons()->count();

        return $lessons_count;
    }

    public function lastLessonPublished()
    {
        $lesson = $this->lessons()
            ->orderBy('published_at', 'DESC')
            ->first();

        return ($lesson) ? $lesson->published_at->diffForHumans() : '-';
    }
}
