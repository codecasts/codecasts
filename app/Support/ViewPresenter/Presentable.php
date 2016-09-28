<?php

namespace Codecasts\Support\ViewPresenter;

/**
 * Class Presentable.
 */
trait Presentable
{
    /**
     * View presenter instance.
     *
     * @var mixed
     */
    protected $presenterInstance;

    /**
     * Returns a new or existing presenter instance.
     *
     * @throws PresenterException
     *
     * @return mixed
     */
    public function present()
    {
        if (!$this->presenter or !class_exists($this->presenter)) {
            throw new PresenterException('Please set the $presenter property to your presenter path.');
        }

        if (!$this->presenterInstance) {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }
}
