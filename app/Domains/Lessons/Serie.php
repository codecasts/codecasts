<?php

namespace Codecasts\Domains\Lessons;

use Codecasts\Domains\Lessons\Presenters\SeriePresenter;
use Codecasts\Support\ViewPresenter\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use SoftDeletes, Presentable;

    protected $table = 'series';

    protected $fillable = [
        'title',
        'description',
        'visible',
        'slug',
    ];

    //protected $casts = [
    //    'visible' =>  'boolean',
    //];

    protected $presenter = SeriePresenter::class;

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'serie_id');
    }

    public function firstLessonSlug()
    {
        $lesson = $this->lessons->first();

        return $lesson->slug ?? null;
    }

    public function lessonCount()
    {
        $lessons_count = $this->lessons->count();

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
