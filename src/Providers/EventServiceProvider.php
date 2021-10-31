<?php

namespace ESignatures\Providers;

use Illuminate\Support\Facades\Event;
use ESignatures\Events\HookFailed;
use ESignatures\Events\HookSucceed;
use ESignatures\Listeners\LogHookFailed;
use ESignatures\Listeners\LogHookSucceed;

/**
 * Class EventServiceProvider
 * @package ESignatures\Providers
 */
class EventServiceProvider extends BaseServiceProvider
{
    /**
     * @var array
     */
    protected array $eventListeners = [
        HookFailed::class => [
            LogHookFailed::class
        ],
        HookSucceed::class => [
            LogHookSucceed::class
        ],
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->eventListeners as $event => $listeners) {
            foreach (array_unique($listeners) as $listener) {
                Event::listen($event, $listener);
            }
        }
    }
}
