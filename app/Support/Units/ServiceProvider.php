<?php

namespace Codecasts\Support\Units;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

/**
 * Class UnitServiceProvider.
 */
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * @var array List of Unit Service Providers to Register
     */
    protected $providers = [];

    /**
     * @var string Unit Alias for Translations and Views
     */
    protected $alias;

    /**
     * @var bool Enable views loading on the Unity
     */
    protected $hasViews = false;

    /**
     * @var bool Enable translations loading on the Unity
     */
    protected $hasTranslations = false;

    /**
     * Boot required registering of views and translations.
     */
    public function boot()
    {
        // register unity translations.
        $this->registerTranslations();

        // register unity views.
        $this->registerViews();
    }

    public function register()
    {
        // register unity custom domains.
        $this->registerProviders(collect($this->providers));
    }

    /**
     * Register Unit Custom ServiceProviders.
     *
     * @param Collection $providers
     */
    protected function registerProviders(Collection $providers)
    {
        // loop through providers to be registered.
        $providers->each(function ($providerClass) {
            // register a provider class.
            $this->app->register($providerClass);
        });
    }

    /**
     * Register unity translations.
     */
    protected function registerTranslations()
    {
        if ($this->hasTranslations) {
            $this->loadTranslationsFrom(
                $this->unitPath('Resources/Lang'),
                $this->alias
            );
        }
    }

    /**
     * Register unity views.
     */
    protected function registerViews()
    {
        if ($this->hasViews) {
            $this->loadViewsFrom(
                $this->unitPath('Resources/Views'),
                $this->alias
            );
        }
    }

    /**
     * Detects the unit base path so resources can be proper loaded
     * on child classes.
     *
     * @param string $append
     *
     * @return string
     */
    protected function unitPath($append = null)
    {
        $reflection = new \ReflectionClass($this);

        $realPath = realpath(dirname($reflection->getFileName()).'/../');

        if (!$append) {
            return $realPath;
        }

        return $realPath.'/'.$append;
    }
}
