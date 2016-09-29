<?php

namespace Codecasts\Units\Core\Http\Middleware;

use Closure;

/**
 * Class RedirectIfWrongUrlOrProtocol.
 */
class RedirectIfWrongUrlOrProtocol
{
    /** @var Request */
    protected $request;

    public function handle($request, Closure $next)
    {
        if (!app()->runningInConsole()) {
            $this->request = $request;

            $this->trustProxies();

            if (!$this->isTheRightDomain() || !$this->isTheRightProtocol()) {
                return $this->redirect();
            }
        }

        return $next($request);
    }

    protected function trustProxies()
    {
        // trust proxies before anything
        $this->request->setTrustedProxies($this->request->getClientIps());
    }

    protected function getDomain()
    {
        $root = $this->request->root();

        if (str_contains($root, 'http://')) {
            return str_replace('http://', '', $root);
        } elseif (str_contains($root, 'https://')) {
            return str_replace('https://', '', $root);
        }

        return $root;
    }

    protected function redirect()
    {
        $protocol = config('app.secure') ? 'https://' : 'http://';
        $domain = config('app.domain');
        $path = $this->request->path() == '/' ? '' : '/'.$this->request->path();

        return redirect()->to($protocol.$domain.$path);
    }

    protected function isTheRightDomain()
    {
        $defaultDomain = config('app.domain');
        $currentDomain = $this->getDomain();

        return $defaultDomain == $currentDomain;
    }

    protected function isTheRightProtocol()
    {
        $shouldBeSecure = config('app.secure');
        $isSecure = $this->request->isSecure();

        return $shouldBeSecure == $isSecure;
    }
}