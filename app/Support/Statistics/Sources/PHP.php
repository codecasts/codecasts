<?php

namespace Codecasts\Support\Statistics\Sources;

class PHP extends Source
{
    protected $key = 'php_version';

    public function get()
    {
        return $this->response(function () {
            return $this->parsePHPVersion();
        });
    }

    protected function parsePHPVersion()
    {
        if (str_contains(PHP_VERSION, '-')) {
            $versionArray = explode('-', PHP_VERSION);

            return $versionArray[0];
        } else {
            return PHP_VERSION;
        }
    }
}
