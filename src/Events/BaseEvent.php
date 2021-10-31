<?php

namespace ESignatures\Events;

/**
 * Class BaseEvent
 * @package ESignatures\Events
 */
abstract class BaseEvent
{
    /**
     * @var array
     */
    public array $data;

    /**
     * BaseEvent constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
