<?php

namespace Codecasts\Domains\Lessons\Contracts;

use Artesaos\Warehouse\Contracts\BaseRepository;
use Artesaos\Warehouse\Contracts\Segregated\CrudRepository;

/**
 * Interface LessonRepository.
 */
interface LessonRepository extends CrudRepository, BaseRepository
{
    /**
     * All visible lessons.
     *
     * @param int  $take
     * @param bool $paginate
     *
     * @return mixed
     */
    public function getVisible($take = 9, $paginate = true);

    /**
     * Find a lesson by it's slug.
     *
     * @param $slug
     * @param bool $fail
     *
     * @return mixed
     */
    public function findBySlug($slug, $fail = false);

    /**
     * Calculate how much time is already published.
     *
     * @return mixed
     */
    public function totalPublishedTime();

    /**
     * Number of visible lessons.
     *
     * @return mixed
     */
    public function visibleCount();

    /**
     * Find the lesson using the encrypted id.
     *
     * @param $encrypted_id
     *
     * @return mixed
     */
    public function findByEncryptedId($encrypted_id);
}
