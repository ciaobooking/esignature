<?php

namespace ESignatures\Providers;

/**
 * Class ConfigServiceProvider
 * @package ESignatures\Providers
 */
class ConfigServiceProvider extends BaseServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->configureLogging();
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
    public function configureLogging()
    {
        $config = config('e-signatures.logging.channel');
        config(['logging.channels.e-signatures' => $config]);
    }
}
