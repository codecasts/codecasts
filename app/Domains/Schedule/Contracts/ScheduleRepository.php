<?php

namespace Codecasts\Domains\Schedule\Contracts;

use Artesaos\Warehouse\Contracts\Segregated\CrudRepository;

interface ScheduleRepository extends CrudRepository
{
    public function getOrderedByDate($take = 30, $paginate = true);
}
