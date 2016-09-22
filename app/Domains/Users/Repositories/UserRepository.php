<?php

namespace App\Domains\Users\Repositories;

use App\Domains\Users\Transformers\UserTransformer;
use App\Domains\Users\User;
use Artesaos\Warehouse\AbstractCrudRepository;
use App\Domains\Users\Contracts\UserRepository as UserRepositoryContract;
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
