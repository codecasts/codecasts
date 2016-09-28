<?php

namespace Codecasts\Domains\Lessons\Repositories;

use Artesaos\Warehouse\AbstractCrudRepository;
use Artesaos\Warehouse\Traits\ImplementsFractal;
use Codecasts\Domains\Lessons\Contracts\TrackRepository as TrackRepositoryContract;
use Codecasts\Domains\Lessons\Track;
use Codecasts\Domains\Lessons\Transformers\TrackTransformer;

class TrackRepository extends AbstractCrudRepository implements TrackRepositoryContract
{
    use ImplementsFractal;

    protected $modelClass = Track::class;

    protected $transformerClass = TrackTransformer::class;

    public function getAll($take = 15, $paginate = true)
    {
        $query = $this->newQuery()->orderBy('id', 'desc');

        return $this->doQuery($query, $take, $paginate);
    }

    /**
     * @param string $slug
     * @param bool   $fail
     *
     * @return Track|null
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
        $query->leftJoin('lessons', 'lessons.track_id', '=', 'tracks.id');
        $query->select('tracks.*');
        $query->groupBy('tracks.id');
        $query->orderByRaw('max(lessons.published_at) desc');

        return $this->doQuery($query, $take, $paginate);
    }
}
