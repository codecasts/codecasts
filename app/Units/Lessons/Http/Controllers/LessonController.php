<?php

namespace Codecasts\Units\Lessons\Http\Controllers;

use Codecasts\Domains\Lessons\Contracts\LessonRepository;
use Codecasts\Domains\Lessons\Events\LessonDownloaded;
use Codecasts\Domains\Lessons\Events\LessonPlayed;
use Codecasts\Domains\Users\User;
use Codecasts\Support\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Repository as Cache;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Response;

class LessonController extends Controller
{
    use SEOTools;

    /**
     * @var LessonRepository
     */
    protected $repository;

    public function __construct(LessonRepository $repository)
    {
        parent::__construct();

        $this->middleware('auth', ['only' => ['download', 'play']]);

        $this->repository = $repository;
    }

    public function index(Request $request, Cache $cache)
    {
        $this->seo()->setTitle(ucfirst(trans('lesson::lesson.lessons')));

        $page = (int) $request->get('page', 0);

        if (app()->env == 'local') {
            $cache->forget('_lessons.index.page.'.$page);
        }

        $lessons = $cache->remember('_lessons.index.page.'.$page, 10, function () {
            return $this->repository->getVisible();
        });

        return $this->view('lessons::index')->with(compact('lessons'));
    }

    public function show($slug)
    {
        $lesson = $this->repository->findBySlug($slug);

        if ($lesson) {
            if (!empty($lesson->thumb_url)) {
                $this->seo()->addImages($lesson->thumb_url);
            }

            if ($lesson->track) {
                $this->seo()->setTitle($lesson->title.' ['.$lesson->track->title.']');
            } else {
                $this->seo()->setTitle($lesson->title);
            }

            $this->seo()->setDescription($lesson->description);

            return $this->view('lessons::show')->with(compact('lesson'));
        }

        return redirect(route('lesson.index'));
    }

    public function download($encrypted_id)
    {
        $lesson = $this->repository->findByEncryptedId($encrypted_id);

        if ($lesson) {
            /** @var User $user */
            $user = $this->user;
            if ($user->subscribed() || !$lesson->paid) {
                event(new LessonDownloaded($lesson));

                return redirect($lesson->video_download_url);
            }
        }

        return redirect(route('lesson.index'));
    }

    public function play($encrypted_id)
    {
        $lesson = $this->repository->findByEncryptedId($encrypted_id);

        if ($lesson) {
            /** @var User $user */
            $user = $this->user;
            if ($user->subscribed() || !$lesson->paid) {
                event(new LessonPlayed($lesson));

                return redirect($lesson->video_watch_url);
            }
        }

        return redirect(route('lesson.index'));
    }

    public function thumb($slug)
    {
        $lesson = $this->repository->findBySlug(str_replace('.jpg', '', $slug));

        if ($lesson) {
            $response = new Response($lesson->video_thumb_contents, 200, [
                'Content-type' => 'image/jpeg',
            ]);

            return $response;
        }

        return redirect(route('lesson.index'));
    }
}
