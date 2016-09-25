<?php

namespace Codecasts\Support\Statistics\Sources;

class Source
{
    protected $key;

    protected $timeToLive = 120;

    protected function response($callback)
    {
        return app('cache')->remember($this->key, $this->timeToLive, $callback);
    }
}
