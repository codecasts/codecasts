<?php

namespace Codecasts\Units\Auth\Routes;

use Codecasts\Support\Http\Routing\RouteFile;

/**
 * Web Routes.
 *
 * This file is where you may define all of the routes that are handled
 * by your application. Just tell Laravel the URIs it should respond
 * to using a Closure or controller method. Build something great!
 */
class Web extends RouteFile
{
    /**
     * Declare Web Routes.
     */
    public function routes()
    {
        // Authentication routes.
        $this->authenticationRoutes();

        // Registration routes.
        $this->registrationRoutes();

        // Password Reset routes.
        $this->passwordResetRoutes();
    }

    protected function authenticationRoutes()
    {
        $this->router->get('login', 'LoginController@showLoginForm')
            ->name('login');
        $this->router->post('login', 'LoginController@login');
        $this->router->post('logout', 'LoginController@logout');
    }

    protected function registrationRoutes()
    {
        $this->router->get('register', 'RegisterController@showRegistrationForm');
        $this->router->post('register', 'RegisterController@register');
    }

    protected function passwordResetRoutes()
    {
        $this->router->get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
        $this->router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
        $this->router->get('password/reset/{token}', 'ResetPasswordController@showResetForm');
        $this->router->post('password/reset', 'ResetPasswordController@reset');
    }
}
