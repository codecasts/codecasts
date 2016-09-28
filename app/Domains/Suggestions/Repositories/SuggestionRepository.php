<?php

namespace Codecasts\Domains\Suggestions\Repositories;

use Artesaos\Warehouse\AbstractCrudRepository;
use Artesaos\Warehouse\Traits\ImplementsFractal;
use Codecasts\Domains\Suggestions\Contracts\SuggestionRepository as SuggestionRepositoryContract;
use Codecasts\Domains\Suggestions\Suggestion;
use Codecasts\Domains\Suggestions\Transformers\SuggestionTransformer;

class SuggestionRepository extends AbstractCrudRepository implements SuggestionRepositoryContract
{
    use ImplementsFractal;

    protected $modelClass = Suggestion::class;

    protected $transformerClass = SuggestionTransformer::class;

    public function getVisibleWithVotes($take = 30, $paginate = true)
    {
        $query = $this->newQuery();
        $query->where('visible', true)
            ->with('user')
            ->leftJoin('suggestions_votes', 'suggestions_votes.suggestion_id', '=', 'suggestions.id')
            ->select('suggestions.*', \DB::raw('count(suggestions_votes.suggestion_id) AS votes_count'))
            ->groupBy('suggestions.id')
            ->orderBy('votes_count', 'DESC');

        return $this->doQuery($query, $take, $paginate);
    }
}
