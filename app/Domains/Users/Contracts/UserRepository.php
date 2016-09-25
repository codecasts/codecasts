<?php

namespace Codecasts\Domains\Users\Contracts;

use Artesaos\Warehouse\Contracts\BaseRepository;
use Artesaos\Warehouse\Contracts\Segregated\CrudRepository;

/**
 * Interface UserRepository.
 *
 * User repository should implement full crud and some custom methods.
 */
interface UserRepository extends CrudRepository, BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection List of admin users
     */
    public function getAdmins();

    /**
     * @return int Number of registered users
     */
    public function getCount();
}
