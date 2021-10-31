<?php

namespace ESignatures\Events;

use ESignatures\Contracts\HookEventInterface;

/**
 * Class HookEvent
 * @package ESignatures\Events
 */
class HookEvent extends BaseEvent implements HookEventInterface
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data['data'];
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->data['status'];
    }
}
