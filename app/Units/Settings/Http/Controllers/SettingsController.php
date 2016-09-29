<?php

namespace Codecasts\Units\Settings\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Domains\Users\Contracts\UserRepository;
use Codecasts\Support\Http\Controller;
use Codecasts\Units\Settings\Http\Requests\UpdateUserRequest;

class SettingsController extends Controller
{
    use SEOTools;

    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;

        $this->middleware('auth');
    }

    public function support()
    {
        $this->seo()->setTitle('Suporte');

        return $this->view('settings::support');
    }

    public function profile()
    {
        $this->seo()->setTitle('Perfil');

        return $this->view('settings::profile');
    }

    public function updateProfile(UpdateUserRequest $request)
    {
        $user = $this->user;

        $this->repository->update($user, $request->only([
            'username',
            'name',
            'email',
        ]));

        return redirect()->back()->with('_success', 'Perfil atualizado.');
    }
}
