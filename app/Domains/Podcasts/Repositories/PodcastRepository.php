<?php

namespace Codecasts\Domains\Podcasts\Repositories;

use Artesaos\Warehouse\AbstractCrudRepository;
use Codecasts\Domains\Podcasts\Contracts\PodcastRepository as PodcastRepositoryContract;
use Codecasts\Domains\Podcasts\Podcast;

class PodcastRepository extends AbstractCrudRepository implements PodcastRepositoryContract
{
    protected $modelClass = Podcast::class;

    public function getAll($take = 15, $paginate = true)
    {
        $query = $this->newQuery();
        $query->orderBy('published_at', 'desc');

        return $this->doQuery($query, $take, $paginate);
    }

    public function getVisible($take = 9, $paginate = true)
    {
        $query = $this->newQuery();
        $query->where('visible', true);
        $query->orderBy('published_at', 'desc');

        return $this->doQuery($query, $take, $paginate);
    }

    public function findBySlug($slug, $fail = false)
    {
        $query = $this->newQuery()->where('slug', $slug);

        if ($fail) {
            return $query->firstOrFail();
        } else {
            return $query->first();
        }
    }

    public function findByEncryptedId($encrypted_id)
    {
        $id = app('encrypter')->decrypt($encrypted_id);

        $query = $this->newQuery()->where('id', $id);

        return $query->first();
    }
}
