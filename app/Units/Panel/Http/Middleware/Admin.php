<?php

namespace Codecasts\Units\Panel\Http\Middleware;

use Closure;
use Codecasts\Domains\Users\User;

class Admin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {

        /** @var User $user */
        $user = app('auth')->user();

        if ($user->isAdmin()) {
            return $next($request);
        }

        return redirect(route('lesson.index'));
    }
}
