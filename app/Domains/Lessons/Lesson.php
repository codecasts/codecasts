<?php

namespace Codecasts\Domains\Lessons;

use Codecasts\Domains\Lessons\Presenters\LessonPresenter;
use Codecasts\Domains\Tags\Tag;
use Codecasts\Domains\Users\User;
use Codecasts\Support\Media\Exceptions\UrlNotFound;
use Codecasts\Support\Media\S3MediaManager;
use Codecasts\Support\ViewPresenter\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes, Presentable;

    protected $presenter = LessonPresenter::class;

    protected $table = 'lessons';

    protected $bucket = 'videos';

    protected $defaultTtl = '+30 minutes';

    protected $fillable = [
        'author_id',
        'slug',
        'title',
        'description',
        'video',
        'length',
        'level',
        'published',
        'visible',
        'paid',
        'serie_id',
        'published_at',

    ];

    protected $dates = [
        'published_at',
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'lessons_tags', 'lesson_id', 'tag_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function logs()
    {
        return $this->hasMany(LessonLog::class, 'lesson_id');
    }

    public function getVideoDownloadUrlAttribute()
    {
        try {
            $manager = new S3MediaManager("CODECASTS-{$this->slug}.mp4", $this->bucket, $this->defaultTtl);

            return $manager->getDownloadUrl();
        } catch (UrlNotFound $e) {
            return;
        }
    }

    public function getVideoWatchUrlAttribute()
    {
        try {
            $manager = new S3MediaManager("CODECASTS-{$this->slug}.mp4", $this->bucket, $this->defaultTtl);

            return $manager->getStreamingUrl();
        } catch (UrlNotFound $e) {
            return;
        }
    }

    public function getVideoThumbContentsAttribute()
    {
        try {
            $manager = new S3MediaManager("CODECASTS-{$this->slug}.jpg", $this->bucket, $this->defaultTtl);

            return $manager->getThumbContent();
        } catch (UrlNotFound $e) {
            return;
        }
    }

    public function getPlayUrlAttribute()
    {
        $encryptedId = app('encrypter')->encrypt($this->id);

        return route('lesson.play', [$encryptedId]);
    }

    public function getDownloadUrlAttribute()
    {
        $encryptedId = app('encrypter')->encrypt($this->id);

        return route('lesson.download', [$encryptedId]);
    }

    public function getThumbUrlAttribute()
    {
        return route('lesson.thumb', [$this->slug]).'.jpg';
    }
}
