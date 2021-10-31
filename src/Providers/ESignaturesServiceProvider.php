<?php

namespace ESignatures\Providers;

/**
 * Class ESignaturesServiceProvider
 * @package ESignatures\Providers
 */
class ESignaturesServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfigs();
    }

    /**
     *
     */
    public function register()
    {
        $this->registerProviders();
    }

    /**
     *
     */
    public function registerProviders()
    {
        $this->app->register(HttpServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(ConfigServiceProvider::class);
    }

    /**
     *
     */
    public function publishConfigs()
    {
        $this->publishes([
            __DIR__ . '../../config/e-signatures.php' => config_path('e-signatures.php'),
        ]);
    }
}
