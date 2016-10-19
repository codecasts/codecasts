<?php

namespace Codecasts\Units\Panel\Http\Controllers\Lesson;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Domains\Lessons\Contracts\SerieRepository;
use Codecasts\Support\Http\Controller;
use Codecasts\Units\Panel\Http\Requests\Lesson\NewSerieRequest;
use Codecasts\Units\Panel\Http\Requests\Lesson\UpdateSerieRequest;

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

    public function index()
    {
        $this->seo()->setTitle('Séries');

        $series = $this->repository->getAll(20, true);

        return $this->view('panel::lesson.serie.index')->with(compact('series'));
    }

    public function create()
    {
        $this->seo()->setTitle('Nova Série');

        return $this->view('panel::lesson.serie.create');
    }

    public function store(NewSerieRequest $request)
    {
        $data = $request->all();

        $slug = $request->get('slug');

        if (!$slug) {
            $data['slug'] = str_slug($request->get('title'));
        }

        $serie = $this->repository->create($data);

        if ($serie) {
            return redirect(route('panel.lesson.serie.index'));
        }

        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $this->seo()->setTitle('Editar Série');

        $serie = $this->repository->findByID($id);

        if ($serie) {
            return $this->view('panel::lesson.serie.edit')->with(compact('serie'));
        }

        return redirect(route('panel.lesson.serie.index'));
    }

    public function update($id, UpdateSerieRequest $request)
    {
        $serie = $this->repository->findByID($id);

        if ($serie) {
            $this->repository->update($serie, $request->all());
        }

        return redirect(route('panel.lesson.serie.index'));
    }

    public function destroy($id)
    {
        $serie = $this->repository->findByID($id);

        if ($serie) {
            foreach ($serie->lessons as $lesson) {
                $lesson->serie_id = null;
                $lesson->save();
            }

            $serie->delete();
        }

        return redirect(route('panel.lesson.serie.index'));
    }
}
