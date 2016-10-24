<?php

namespace Codecasts\Domains\Podcasts;

use Codecasts\Support\Testing\DatabaseMigrations;
use Codecasts\Domains\Users\User;
use Illuminate\Support\Collection;

class PodcastTest extends \TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_returns_the_correct_collection_authors()
    {
        $this->runDatabaseMigrations();

        factory(User::class)->times(2)->create();

        $podcast = factory(Podcast::class)->make(['authors'=>[1,2]]);

        $users = new Collection([
            User::find(1),
            User::find(2),
        ]);

        $this->assertEquals($users, $podcast->authors());
    }

    /** @test */
    public function it_returns_the_correct_get_play_url_attribute()
    {
        $podcast = factory(Podcast::class)->make();

        $url = route('podcast.play',['']);

        $this->assertEquals(true, preg_match('#'.$url.'/[\d\w=]{188,192}#', $podcast->getPlayUrlAttribute()));
    }

    /** @test */
    public function it_returns_the_correct_get_download_url_attribute()
    {
        $podcast = factory(Podcast::class)->make();

        $url = route('podcast.download',['']);

        $this->assertEquals(true, preg_match('#'.$url.'/[\d\w=]{188,192}#', $podcast->getDownloadUrlAttribute()));
    }

    /** @test */
    public function it_returns_the_correct_get_thumb_url_attribute()
    {
        $podcast = factory(Podcast::class)->make(['slug'=>'teste']);

        $url = route('podcast.thumb',['teste.jpg']);

        $this->assertEquals($url,$podcast->getThumbUrlAttribute());
    }

    //////////////////// InvalidArgumentException: Missing required client configuration options ////////////////////

    // /** @test */
    // public function it_returns_the_correct_get_audio_download_url_attribute()
    // {
    //     $podcast = factory(Podcast::class)->make(['title'=>'teste']);

    //     $this->assertEquals('...CODECASTS-teste.mp3', $podcast->getAudioDownloadUrlAttribute());
    // }

    // /** @test */
    // public function it_returns_the_correct_get_audio_listen_url_attribute()
    // {
    //     $podcast = factory(Podcast::class)->make(['title'=>'teste']);

    //     $this->assertEquals('...CODECASTS-teste.mp3', $podcast->getAudioListenUrlAttribute());
    // }

    // /** @test */
    // public function it_returns_the_correct_get_audio_thumb_contents_attribute()
    // {
    //     $podcast = factory(Podcast::class)->make(['title'=>'teste']);

    //     $this->assertEquals('...CODECASTS-teste.jpg', $podcast->getAudioThumbContentsAttribute());
    // }
}
