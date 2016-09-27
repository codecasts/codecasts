<?php

namespace Codecasts\Support\Statistics\Sources;

class Laravel extends Source
{
    protected $key = 'laravel_version';

    public function get()
    {
        return $this->response(function () {
            return app()->version();
        });
    }
}
