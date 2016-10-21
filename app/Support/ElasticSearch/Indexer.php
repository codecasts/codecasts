<?php

namespace Codecasts\Support\ElasticSearch;

use Illuminate\Support\Collection;

/**
 * Class Indexer.
 */
class Indexer
{
    /**
     * @var Collection
     */
    protected $items;

    /**
     * @var string
     */
    protected $type;

    /**
     * Indexer constructor.
     *
     * @param Collection $items
     * @param string     $type
     */
    public function __construct(Collection $items, $type)
    {
        $this->items = $items;

        $this->type = $type;
    }

    public function index()
    {
        $elastic = app('elastic');

        $this->items->each(function ($item) use ($elastic) {
            $item->serie_title = $item->serie ? $item->serie->title : '';

            $elastic->index([
                'index' => 'codecasts',
                'type'  => $this->type,
                'id'    => $item->id,
                'body'  => $item->toArray(),
            ]);
        });
    }
}
