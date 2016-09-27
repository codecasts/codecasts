<?php

namespace Codecasts\Support\Statistics\Sources;

class Codecasts extends Source
{
    protected $key = 'codecasts_version';

    public function get()
    {
        return $this->response(function () {
            if ($this->versionFileExists()) {
                return $this->getVersionFromFile();
            }

            return null;
        });
    }

    protected function versionFileExists()
    {
        return file_exists($this->getVersionFilePath());
    }

    protected function getVersionFromFile()
    {
        return file_get_contents($this->getVersionFilePath());
    }

    protected function getVersionFilePath()
    {
        return base_path('.version');
    }
}
