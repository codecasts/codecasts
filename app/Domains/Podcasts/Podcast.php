<?php

namespace Codecasts\Domains\Podcasts;

use Codecasts\Domains\Podcasts\Presenters\PodcastPresenter;
use Codecasts\Domains\Users\User;
use Codecasts\Support\Media\Exceptions\UrlNotFound;
use Codecasts\Support\Media\S3MediaManager;
use Codecasts\Support\ViewPresenter\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Podcast extends Model
{
    use SoftDeletes, Presentable;

    protected $presenter = PodcastPresenter::class;

    protected $table = 'podcasts';

    protected $bucket = 'audios';

    protected $defaultTtl = '+2 hours';

    protected $fillable = [
        'id',
        'slug',
        'title',
        'description',
        'audio',
        'authors',
        'length',
        'level',
        'published',
        'visible',
        'published_at',

    ];

    protected $dates = [
        'published_at',
    ];

    protected $casts = [
        'authors' => 'json',
    ];

    public function authors()
    {
        $authorIds = $this->authors;

        $authors = [];

        foreach ((array) $authorIds as $authorId) {
            $author = User::find($authorId);

            if ($author) {
                $authors[] = $author;
            }
        }

        return new Collection($authors);
    }

    public function getAudioDownloadUrlAttribute()
    {
        try {
            $manager = new S3MediaManager("CODECASTS-{$this->slug}.mp3", $this->bucket, $this->defaultTtl);

            return $manager->getDownloadUrl();
        } catch (UrlNotFound $e) {
            return null;
        }
    }

    public function getAudioListenUrlAttribute()
    {
        try {
            $manager = new S3MediaManager("CODECASTS-{$this->slug}.mp3", $this->bucket, $this->defaultTtl);

            return $manager->getStreamingUrl();
        } catch (UrlNotFound $e) {
            return null;
        }
    }

    public function getAudioThumbContentsAttribute()
    {
        try {
            $manager = new S3MediaManager("CODECASTS-{$this->slug}.jpg", $this->bucket, $this->defaultTtl);

            return $manager->getThumbContent();
        } catch (UrlNotFound $e) {
            return null;
        }
    }

    public function getPlayUrlAttribute()
    {
        $encryptedId = app('encrypter')->encrypt($this->id);

        return route('podcast.play', [$encryptedId]);
    }

    public function getDownloadUrlAttribute()
    {
        $encryptedId = app('encrypter')->encrypt($this->id);

        return route('podcast.download', [$encryptedId]);
    }

    public function getThumbUrlAttribute()
    {
        return route('podcast.thumb', [$this->slug]).'.jpg';
    }
}
