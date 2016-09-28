<?php

namespace Codecasts\Support\ElasticSearch;

use Illuminate\Support\Collection;

/**
 * Class SearchableTrait.
 */
trait SearchableTrait
{
    /**
     * Search public method.
     *
     * @param $term
     * @param int $take
     *
     * @return static
     */
    public function search($term, $take = 10)
    {
        return $this->doSearch($term, $take);
    }

    /**
     * Internal search implementation.
     *
     * @param string $term  The term to search for
     * @param int    $take  How much records should be returned
     * @param string $index The ElasticSearch index to search against
     *
     * @return \Illuminate\Support\Collection
     */
    protected function doSearch($term, $take = 10, $index = 'codecasts')
    {
        $results = app('elastic')->search([
            'index' => $index,
            'type'  => $this->modelClass,
            'body'  => [
                'query' => [
                    'query_string' => [
                        'query' => "*{$term}*",
                        //"default_field" => "domain"
                    ],
                ],
            ],
        ]);

        return $this->buildCollection($results)->forPage(1, $take);
    }

    /**
     * @param array $items the elasticsearch result
     *
     * @return Collection of Eloquent models
     */
    protected function buildCollection($items)
    {
        $result = $items['hits']['hits'];

        return Collection::make(array_map(function ($r) {
            $article = new $this->modelClass();
            $article->newInstance($r['_source'], true);
            $article->setRawAttributes($r['_source'], true);

            return $article;
        }, $result));
    }
}
