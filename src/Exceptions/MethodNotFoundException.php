<?php

namespace ESignatures\Exceptions;

use Throwable;

/**
 * Class MethodNotFoundException
 * @package ESignatures\Exceptions
 */
class MethodNotFoundException extends BaseException
{
    /**
     * @param string $method
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $method, $code = 0, Throwable $previous = null)
    {
        parent::__construct("$method method not found", $code, $previous);
    }
}
