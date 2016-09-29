<?php

namespace Codecasts\Units\Lessons\Http\Controllers;

use Codecasts\Domains\Lessons\Contracts\TrackRepository;
use Codecasts\Support\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Repository as Cache;
use Artesaos\SEOTools\Traits\SEOTools;

class TrackController extends Controller
{
    use SEOTools;

    /**
     * @var TrackRepository
     */
    protected $repository;

    public function __construct(TrackRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    public function index(Request $request, Cache $cache)
    {
        $this->seo()->setTitle(ucfirst(trans('lesson::lesson.tracks')));

        $page = (int) $request->get('page', 0);

        if (app()->env == 'local') {
            $cache->forget('_lessons.tracks.index.page.'.$page);
        }

        $tracks = $cache->remember('_lessons.tracks.index.page.'.$page, 10, function () {
            return $this->repository->getVisible();
        });

        return $this->view('lessons::track.index')->with(compact('tracks'));
    }

    public function show($slug)
    {
        $track = $this->repository->findBySlug($slug);

        if (!$track) {
            return redirect()->route('track.index');
        }

        $this->seo()->setTitle('Série '.$track->title);

        $this->seo()->setDescription($track->description);

        $lesson = $track->lessons()->orderBy('published_at')->first();

        if ($lesson && !empty($lesson->thumb_url)) {
            $this->seo()->addImages($lesson->thumb_url);
        }

        return $this->view('lessons::track.show')->with(compact('track'));
    }
}
