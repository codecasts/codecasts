<?php

namespace Codecasts\Units\Lessons\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Domains\Lessons\Contracts\SerieRepository;
use Codecasts\Support\Http\Controller;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    use SEOTools;

    /**
     * @var SerieRepository
     */
    protected $repository;

    public function __construct(SerieRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    public function index(Request $request, Cache $cache)
    {
        $this->seo()->setTitle(ucfirst(trans('lesson::lesson.series')));

        $page = (int) $request->get('page', 0);

        if (app()->env == 'local') {
            $cache->forget('_lessons.series.index.page.'.$page);
        }

        $series = $cache->remember('_lessons.series.index.page.'.$page, 10, function () {
            return $this->repository->getVisible();
        });

        return $this->view('lessons::serie.index')->with(compact('series'));
    }

    public function show($slug)
    {
        $serie = $this->repository->findBySlug($slug);

        if (!$serie) {
            return redirect()->route('serie.index');
        }

        $this->seo()->setTitle('Série '.$serie->title);

        $this->seo()->setDescription($serie->description);

        $lesson = $serie->lessons()->orderBy('published_at')->first();

        if ($lesson && !empty($lesson->thumb_url)) {
            $this->seo()->addImages($lesson->thumb_url);
        }

        return $this->view('lessons::serie.show')->with(compact('serie'));
    }
}
