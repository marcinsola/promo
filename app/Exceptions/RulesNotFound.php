<?php

namespace App\Exceptions;

use RuntimeException;
use Throwable;

class RulesNotFound extends RuntimeException
{
    private const MESSAGE = "Rules for %s method are not present in %s";

    public function __construct(string $methodName, string $className, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf(self::MESSAGE, $methodName, $className), $code, $previous);
    }
}
