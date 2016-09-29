<?php

namespace Codecasts\Units\Suggestions\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Domains\Suggestions\Contracts\SuggestionRepository;
use Codecasts\Support\Http\Controller;
use Codecasts\Units\Suggestions\Http\Requests\NewSuggestionRequest;

class SuggestionsController extends Controller
{
    use SEOTools;

    /**
     * @var SuggestionRepository
     */
    protected $repository;

    public function __construct(SuggestionRepository $repository)
    {
        parent::__construct();

        $this->middleware('auth', ['only' => ['create', 'store']]);

        $this->repository = $repository;
    }

    public function index()
    {
        $this->seo()->setTitle('Sugestões');

        $suggestions = $this->repository->getVisibleWithVotes(30, true);

        return $this->view('suggestions::index')->with(compact('suggestions'));
    }

    public function store(NewSuggestionRequest $request)
    {
        $data = [
            'title' => $request->get('suggestion'),
            'user_id' => $this->user->id,
            'visible' => true,
            'description' => 'not used',
        ];

        $suggestion = $this->repository->create($data);

        return redirect()->back()->with('_success', 'Sugestão criada!');
    }
}
