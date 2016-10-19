<?php

namespace Codecasts\Domains\Lessons\Contracts;

use Artesaos\Warehouse\Contracts\BaseRepository;
use Artesaos\Warehouse\Contracts\Segregated\CrudRepository;

interface SerieRepository extends CrudRepository, BaseRepository
{
    /**
     * Get all visible series.
     *
     * @param int  $take
     * @param bool $paginate
     *
     * @return mixed
     */
    public function getVisible($take = 9, $paginate = true);

    /**
     * Find a serie by it's slug.
     *
     * @param string $slug
     * @param bool   $fail
     *
     * @return Serie|null
     */
    public function findBySlug($slug, $fail = false);
}
