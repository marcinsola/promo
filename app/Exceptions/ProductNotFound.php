<?php

namespace App\Exceptions;

use RuntimeException;
use Throwable;

class ProductNotFound extends RuntimeException
{
    private const MESSAGE = "Product with id %s not found in PromoAPI";

    public function __construct(string $productId, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf(self::MESSAGE, $productId), $code, $previous);
    }
}
