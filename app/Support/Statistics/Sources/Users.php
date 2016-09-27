<?php

namespace Codecasts\Support\Statistics\Sources;

use Codecasts\Domains\Users\Repositories\UserRepository;

class Users extends Source
{
    protected $key = 'users_count';

    protected $timeToLive = 5;

    public function get()
    {
        return $this->response(function () {
            return $this->getUsersCount();
        });
    }

    protected function getUsersCount()
    {
        $repo = new UserRepository();

        return $repo->getCount();
    }
}
