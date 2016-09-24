<?php

namespace Codecasts\Domains\Users\Presenters;

use Codecasts\Support\ViewPresenter\Presenter;
use Illuminate\Support\Str;

/**
 * Class UserPresenter.
 */
class UserPresenter extends Presenter
{
    public function normalizedName()
    {
        return ucwords(Str::lower($this->entity->name));
    }
}
