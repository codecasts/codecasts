<?php

namespace Codecasts\Domains\Suggestions\Providers;

use Codecasts\Domains\Suggestions\Contracts\SuggestionRepository as SuggestionRepositoryContract;
use Codecasts\Domains\Suggestions\Database\Migrations\CreateSuggestionsTable;
use Codecasts\Domains\Suggestions\Database\Migrations\CreateSuggestionsVotesTable;
use Codecasts\Domains\Suggestions\Repositories\SuggestionRepository;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'suggestions';

    protected $hasTranslations = true;

    protected $bindings = [
        SuggestionRepositoryContract::class => SuggestionRepository::class,
    ];

    protected $migrations = [
        CreateSuggestionsTable::class,
        CreateSuggestionsVotesTable::class,
    ];
}
