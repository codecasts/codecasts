<?php

namespace Codecasts\Domains\Users\Repositories;

use Codecasts\Domains\Users\Transformers\UserTransformer;
use Codecasts\Domains\Users\User;
use Artesaos\Warehouse\AbstractCrudRepository;
use Codecasts\Domains\Users\Contracts\UserRepository as UserRepositoryContract;
use Artesaos\Warehouse\Traits\ImplementsFractal;

/**
 * Class UserRepository.
 */
class UserRepository extends AbstractCrudRepository implements UserRepositoryContract
{
    use ImplementsFractal;

    protected $modelClass = User::class;

    protected $transformerClass = UserTransformer::class;
}
