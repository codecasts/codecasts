<?php

namespace Codecasts\Domains\Lessons\Repositories;

use Artesaos\Warehouse\AbstractCrudRepository;
use Artesaos\Warehouse\Traits\ImplementsFractal;
use Codecasts\Domains\Lessons\Contracts\SerieRepository as SerieRepositoryContract;
use Codecasts\Domains\Lessons\Serie;
use Codecasts\Domains\Lessons\Transformers\SerieTransformer;

class SerieRepository extends AbstractCrudRepository implements SerieRepositoryContract
{
    use ImplementsFractal;

    protected $modelClass = Serie::class;

    protected $transformerClass = SerieTransformer::class;

    public function getAll($take = 15, $paginate = true)
    {
        $query = $this->newQuery()->orderBy('id', 'desc');

        return $this->doQuery($query, $take, $paginate);
    }

    /**
     * @param string $slug
     * @param bool   $fail
     *
     * @return Serie|null
     */
    public function findBySlug($slug, $fail = false)
    {
        $query = $this->newQuery()->where('slug', $slug);

        if ($fail) {
            return $query->firstOrFail();
        } else {
            return $query->first();
        }
    }

    public function getVisible($take = 9, $paginate = true)
    {
        $query = $this->newQuery();
        $query->leftJoin('lessons', 'lessons.serie_id', '=', 'series.id');
        $query->select('series.*');
        $query->groupBy('series.id');
        $query->orderByRaw('max(lessons.published_at) desc');

        return $this->doQuery($query, $take, $paginate);
    }
}
