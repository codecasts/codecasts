<?php

namespace Codecasts\Domains\Podcasts\Contracts;

use Artesaos\Warehouse\Contracts\BaseRepository;
use Artesaos\Warehouse\Contracts\Segregated\CrudRepository;

interface PodcastRepository extends CrudRepository, BaseRepository
{
    public function getVisible($take = 9, $paginate = true);

    public function findBySlug($slug, $fail = false);

    public function findByEncryptedId($encrypted_id);
}
