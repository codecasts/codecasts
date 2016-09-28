<?php

namespace Codecasts\Domains\Users\Repositories;

use Artesaos\Warehouse\AbstractCrudRepository;
use Artesaos\Warehouse\Traits\ImplementsFractal;
use Codecasts\Domains\Users\Contracts\UserRepository as UserRepositoryContract;
use Codecasts\Domains\Users\User;

/**
 * Class UserRepository.
 */
class UserRepository extends AbstractCrudRepository implements UserRepositoryContract
{
    use ImplementsFractal;

    /**
     * @var string Current model that this repository is responsible for
     */
    protected $modelClass = User::class;

    /**
     * Lists all admin users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAdmins()
    {
        $query = $this->newQuery();
        $query->where('admin', true);

        return $this->doQuery($query, false, false);
    }

    /**
     * Get the number of registered users.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->doQuery(null, false, false)->count();
    }
}
