<?php

namespace ESignatures\Providers;

/**
 * Class HttpServiceProvider
 * @package ESignatures\Providers
 */
class HttpServiceProvider extends BaseServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->loadRoutes();
    }

    /**
     *
     */
    public function register()
    {

    }

    /**
     *
     */
    public function loadRoutes()
    {
        if (!$this->app->routesAreCached()) {
            $dir = __DIR__.'/../Http/Routes/*.php';

            foreach (glob($dir) as $filename) {
                require $filename;
            }
        }
    }
}
