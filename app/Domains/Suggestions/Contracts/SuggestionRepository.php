<?php

namespace Codecasts\Domains\Suggestions\Contracts;

use Artesaos\Warehouse\Contracts\Segregated\CrudRepository;

interface SuggestionRepository extends CrudRepository
{
    public function getVisibleWithVotes($take = 30, $paginate = true);
}
