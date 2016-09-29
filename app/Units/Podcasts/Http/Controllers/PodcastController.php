<?php

namespace Codecasts\Units\Podcasts\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Domains\Podcasts\Contracts\PodcastRepository;
use Codecasts\Domains\Podcasts\Events\PodcastDownloaded;
use Codecasts\Domains\Podcasts\Events\PodcastPlayed;
use Codecasts\Support\Http\Controller;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PodcastController extends Controller
{
    use SEOTools;

    /**
     * @var PodcastRepository
     */
    protected $repository;

    public function __construct(PodcastRepository $repository)
    {
        parent::__construct();

        $this->middleware('auth', ['only' => ['download', 'play']]);

        $this->repository = $repository;
    }

    public function index(Request $request, Cache $cache)
    {
        $this->seo()->setTitle('Podcasts');

        $page = (int) $request->get('page', 0);

        if (app()->env == 'local') {
            $cache->forget('_podcasts.index.page.'.$page);
        }

        $podcasts = $cache->remember('_podcasts.index.page.'.$page, 10, function () {
            return $this->repository->getVisible();
        });

        return $this->view('podcasts::index')->with(compact('podcasts'));
    }

    public function show($slug)
    {
        $podcast = $this->repository->findBySlug($slug);

        if ($podcast) {
            if (!empty($podcast->thumb_url)) {
                $this->seo()->addImages($podcast->thumb_url);
            }
            $this->seo()->setTitle($podcast->title);

            $this->seo()->setDescription($podcast->description);

            return $this->view('podcasts::show')->with(compact('podcast'));
        }

        return redirect(route('podcast.index'));
    }

    public function download($encrypted_id)
    {
        $podcast = $this->repository->findByEncryptedId($encrypted_id);

        if ($podcast) {
            event(new PodcastDownloaded($podcast));

            return redirect($podcast->audio_download_url);
        }

        return redirect(route('podcast.index'));
    }

    public function play($encrypted_id)
    {
        $podcast = $this->repository->findByEncryptedId($encrypted_id);

        if ($podcast) {
            event(new PodcastPlayed($podcast));

            return redirect($podcast->audio_listen_url);
        }

        return redirect(route('podcast.index'));
    }

    public function thumb($slug)
    {
        $podcast = $this->repository->findBySlug(str_replace('.jpg', '', $slug));

        if ($podcast) {
            $response = new Response($podcast->audio_thumb_contents, 200, [
                'Content-type' => 'image/jpeg',
            ]);

            return $response;
        }

        return redirect(route('podcast.index'));
    }
}
