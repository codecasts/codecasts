<?php

namespace Codecasts\Domains\Lessons\Repositories;

use Artesaos\Warehouse\AbstractCrudRepository;
use Artesaos\Warehouse\Traits\ImplementsFractal;
use Codecasts\Domains\Lessons\Contracts\LessonRepository as LessonRepositoryContract;
use Codecasts\Domains\Lessons\Lesson;
use Codecasts\Domains\Lessons\Transformers\LessonTransformer;
use Codecasts\Support\ElasticSearch\Contracts\SearchRepository;
use Codecasts\Support\ElasticSearch\SearchableTrait;

class LessonRepository extends AbstractCrudRepository implements LessonRepositoryContract, SearchRepository
{
    use ImplementsFractal, SearchableTrait;

    protected $modelClass = Lesson::class;

    protected $transformerClass = LessonTransformer::class;

    public function getAll($take = 15, $paginate = true)
    {
        $query = $this->newQuery();
        $query->orderBy('published_at', 'desc');

        return $this->doQuery($query, $take, $paginate);
    }

    public function getVisible($take = 9, $paginate = true)
    {
        $query = $this->newQuery();
        $query->where('visible', true);
        $query->orderBy('published_at', 'desc');

        return $this->doQuery($query, $take, $paginate);
    }

    public function findBySlug($slug, $fail = false)
    {
        $query = $this->newQuery()->where('slug', $slug);

        if ($fail) {
            return $query->firstOrFail();
        } else {
            return $query->first();
        }
    }

    public function findByEncryptedId($encrypted_id)
    {
        $id = app('encrypter')->decrypt($encrypted_id);

        $query = $this->newQuery()->where('id', $id);

        return $query->first();
    }

    public function totalPublishedTime()
    {
        $sum = $this->newQuery()
            ->where('visible', true)->sum('length');

        return $sum;
    }

    public function visibleCount()
    {
        $count = $this->newQuery()
            ->where('visible', true)->count();

        return $count;
    }
}
