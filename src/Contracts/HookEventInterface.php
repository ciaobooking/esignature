<?php

namespace ESignatures\Contracts;

/**
 * Interface HookEventInterface
 * @package ESignatures\Contracts
 */
interface HookEventInterface
{
    /**
     * @return array
     */
    public function getData(): array;

    /**
     * @return string
     */
    public function getStatus(): string;
}
