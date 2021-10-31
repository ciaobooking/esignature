<?php

namespace ESignatures\Listeners;

use Illuminate\Support\Facades\Log;
use ESignatures\Events\HookFailed;

/**
 * Class LogHookFailed
 * @package ESignatures\Listeners
 */
class LogHookFailed extends BaseListener
{
    /**
     * @param HookFailed $event
     */
    public function handle(HookFailed $event)
    {
        $title = sprintf('%s %s', 'Hook', $event->data['status']);

        Log::channel('e-signatures')->error($title, $event->data['data']);
    }
}
