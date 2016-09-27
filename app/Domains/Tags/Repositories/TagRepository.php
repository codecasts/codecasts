<?php

namespace Codecasts\Domains\Tags\Repositories;

use Artesaos\Warehouse\AbstractCrudRepository;
use Artesaos\Warehouse\Traits\ImplementsFractal;
use Codecasts\Domains\Tags\Tag;
use Codecasts\Domains\Tags\Transformers\TagTransformer;
use Codecasts\Domains\Tags\Contracts\TagRepository as TagRepositoryContract;

class TagRepository extends AbstractCrudRepository implements TagRepositoryContract
{
    use ImplementsFractal;

    protected $modelClass = Tag::class;

    protected $transformerClass = TagTransformer::class;
}
