<?php

namespace ESignatures\Listeners;

use Illuminate\Support\Facades\Log;
use ESignatures\Events\HookSucceed;

/**
 * Class LogHookSucceed
 * @package ESignatures\Listeners
 */
class LogHookSucceed extends BaseListener
{
    /**
     * @param HookSucceed $event
     */
    public function handle(HookSucceed $event)
    {
        $title = sprintf('%s %s', 'Hook', $event->data['status']);

        Log::channel('e-signatures')->info($title, $event->data['data']);
    }
}
