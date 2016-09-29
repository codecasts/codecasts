<?php

namespace Codecasts\Units\Auth\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Domains\Users\Parsers\ParserResolver;
use Codecasts\Support\Http\Controller;
use Illuminate\Contracts\Auth\Guard;
use SocialNorm\Exceptions\ApplicationRejectedException;
use Codecasts\Domains\Users\User;

/**
 * Class AuthController.
 */
class AuthController extends Controller
{
    use SEOTools;

    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var OAuthManager
     */
    protected $social;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->social = app('adamwathan.oauth');

        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login()
    {
        $this->seo()->setTitle('Entrar');

        return $this->view('auth::login');
    }

    public function social($driver)
    {
        return $this->social->authorize($driver);
    }

    public function callback($driver)
    {
        try {
            $this->social->login($driver, function (User $user, $details) use ($driver) {
                $resolver = new ParserResolver($driver, $details);

                $parser = $resolver->resolve();

                $user->fillSocialData($parser);

                $user->save();

                $this->auth->login($user, true);

                $user->createCustomerId();

                $user->loadSubscription();
            });
        } catch (ApplicationRejectedException $e) {
            return redirect(route('auth.login'))
                ->withErrors([trans('auth::general.rejected')]);
        }

        return redirect()->intended(route('lesson.index'));
    }

    public function logout()
    {
        $this->auth->logout();

        return redirect()->back();
    }
}