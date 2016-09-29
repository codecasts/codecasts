<?php

namespace Codecasts\Units\Suggestions\Http\Controllers;

use Codecasts\Domains\Suggestions\Contracts\SuggestionRepository;
use Codecasts\Support\Http\Controller;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    /**
     * @var SuggestionRepository
     */
    protected $repository;

    public function __construct(SuggestionRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }
    /**
     * @param $id
     *
     * @return array
     */
    public function sync($id)
    {
        $suggestion = $this->repository->findById($id);

        $has = (bool) $suggestion->votes()->where('id', $this->user->id)->count();

        if ($has):
            $suggestion->votes()->detach($this->user); else:
            $suggestion->votes()->attach($this->user);
        endif;

        return [
            'suggestion_id' => $suggestion->id,
            'action' => ($has) ? 'detach' : 'attach',
            'count' => $suggestion->votes()->count(),
        ];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function userVotes(Request $request)
    {
        $ids = $request->get('ids');

        if (!is_array($ids)) {
            $ids = explode(',', $ids);
        }

        $ids = array_filter($ids, function ($n) {
            return (is_numeric($n)) ? (int) $n : false;
        });

        if (empty($ids)) {
            return [];
        }

        return $this->user->suggestionsVotes()->whereIn('id', $ids)->select(['id'])->get()->pluck('id');
    }

    protected function findSuggestion($id)
    {
        return $this->repository->findById($id);
    }
}
