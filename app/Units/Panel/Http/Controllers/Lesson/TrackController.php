<?php

namespace Codecasts\Units\Panel\Http\Controllers\Lesson;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Support\Http\Controller;
use Codecasts\Units\Panel\Http\Requests\Lesson\NewTrackRequest;
use Codecasts\Units\Panel\Http\Requests\Lesson\UpdateTrackRequest;
use Codecasts\Domains\Lessons\Contracts\TrackRepository;

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

    public function index()
    {
        $this->seo()->setTitle('Séries');

        $tracks = $this->repository->getAll(20, true);

        return $this->view('panel::lesson.track.index')->with(compact('tracks'));
    }

    public function create()
    {
        $this->seo()->setTitle('Nova Série');

        return $this->view('panel::lesson.track.create');
    }
    
    public function store(NewTrackRequest $request)
    {
        $data = $request->all();

        $slug = $request->get('slug');

        if (!$slug) {
            $data['slug'] = str_slug($request->get('title'));
        }

        $track = $this->repository->create($data);

        if ($track) {
            return redirect(route('panel.lesson.track.index'));
        }

        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $this->seo()->setTitle('Editar Série');

        $track = $this->repository->findByID($id);

        if ($track) {
            return $this->view('panel::lesson.track.edit')->with(compact('track'));
        }

        return redirect(route('panel.lesson.track.index'));
    }

    public function update($id, UpdateTrackRequest $request)
    {
        $track = $this->repository->findByID($id);

        if ($track) {
            $this->repository->update($track, $request->all());
        }

        return redirect(route('panel.lesson.track.index'));
    }
    
    public function destroy($id)
    {
        $track = $this->repository->findByID($id);

        if ($track) {
            foreach($track->lessons as $lesson) {
                $lesson->track_id = null;
                $lesson->save();
            }

            $track->delete();
        }

        return redirect(route('panel.lesson.track.index'));
    }
}
