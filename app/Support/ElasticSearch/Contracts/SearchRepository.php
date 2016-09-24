<?php

namespace Codecasts\Support\ElasticSearch\Contracts;

/**
 * Class SearchRepository.
 */
interface SearchRepository
{
    public function search($term);
}
