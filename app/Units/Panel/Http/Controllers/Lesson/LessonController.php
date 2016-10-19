<?php

namespace Codecasts\Units\Panel\Http\Controllers\Lesson;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Domains\Lessons\Contracts\LessonRepository;
use Codecasts\Domains\Lessons\Contracts\SerieRepository;
use Codecasts\Domains\Users\Contracts\UserRepository;
use Codecasts\Support\Http\Controller;
use Codecasts\Units\Panel\Http\Requests\Lesson\NewLessonRequest;
use Codecasts\Units\Panel\Http\Requests\Lesson\UpdateLessonRequest;

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

        $this->repository = $repository;
    }

    public function index()
    {
        $this->seo()->setTitle('Aulas');

        $lessons = $this->repository->getAll(25, true);

        return $this->view('panel::lesson.index')->with(compact('lessons'));
    }

    public function create(UserRepository $userRepository, SerieRepository $serieRepository)
    {
        $this->seo()->setTitle('Nova Aula');

        $users = $userRepository->getAdmins();

        $series = $serieRepository->getAll(false, false);

        return $this->view('panel::lesson.create')->with(compact('users', 'series'));
    }

    public function store(NewLessonRequest $request)
    {
        $data = $request->all();

        $slug = $request->get('slug');

        if (!$slug) {
            $data['slug'] = str_slug($request->get('title'));
        }

        $published_at = $request->get('published_at');

        if (!$published_at) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }

        $lesson = $this->repository->create($data);

        if ($lesson) {
            return redirect(route('panel.lesson.index'));
        }

        return redirect()->back()->withInput();
    }

    public function edit($id, UserRepository $userRepository, SerieRepository $serieRepository)
    {
        $this->seo()->setTitle('Editar Aula');

        $lesson = $this->repository->findByID($id);

        if ($lesson) {
            $users = $userRepository->getAdmins();

            $series = $serieRepository->getAll(false, false);

            return $this->view('panel::lesson.edit')->with(compact('lesson', 'users', 'series'));
        }

        return redirect(route('panel.lesson.index'));
    }

    public function update($id, UpdateLessonRequest $request)
    {
        $lesson = $this->repository->findByID($id);

        if ($lesson) {
            $this->repository->update($lesson, $request->all());
        }

        return redirect(route('panel.lesson.index'));
    }

    public function destroy($id)
    {
        $lesson = $this->repository->findByID($id);

        if ($lesson) {
            $lesson->delete();
        }

        return redirect(route('panel.lesson.index'));
    }
}
