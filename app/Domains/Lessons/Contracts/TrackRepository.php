<?php

namespace Codecasts\Domains\Lessons\Contracts;

use Artesaos\Warehouse\Contracts\BaseRepository;
use Artesaos\Warehouse\Contracts\Segregated\CrudRepository;

interface TrackRepository extends CrudRepository, BaseRepository
{
    /**
     * Get all visible tracks.
     *
     * @param int  $take
     * @param bool $paginate
     *
     * @return mixed
     */
    public function getVisible($take = 9, $paginate = true);

    /**
     * Find a track by it's slug.
     *
     * @param string $slug
     * @param bool   $fail
     *
     * @return Track|null
     */
    public function findBySlug($slug, $fail = false);
}
