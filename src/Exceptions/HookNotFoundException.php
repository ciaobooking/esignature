<?php

namespace ESignatures\Exceptions;

use Throwable;

/**
 * Class HookNotFoundException
 * @package ESignatures\Exceptions
 */
class HookNotFoundException extends BaseException
{
    /**
     * @param string $hook
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $hook, $code = 0, Throwable $previous = null)
    {
        parent::__construct("$hook hook not found", $code, $previous);
    }
}
