<?php

namespace Codecasts\Domains\Schedule\Repositories;

use Artesaos\Warehouse\AbstractCrudRepository;
use Artesaos\Warehouse\Traits\ImplementsFractal;
use Codecasts\Domains\Schedule\Schedule;
use Codecasts\Domains\Schedule\Transformers\ScheduleTransformer;
use Codecasts\Domains\Schedule\Contracts\ScheduleRepository as ScheduleRepositoryContract;

class ScheduleRepository extends AbstractCrudRepository implements ScheduleRepositoryContract
{
    use ImplementsFractal;

    protected $modelClass = Schedule::class;

    protected $transformerClass = ScheduleTransformer::class;

    public function getOrderedByDate($take = 30, $paginate = true)
    {
        $query = $this->newQuery();
        $query->orderBy('planed_date', 'asc');

        return $this->doQuery($query, $take, $paginate);
    }
}
