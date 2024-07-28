<?php

namespace App\Exceptions;

use Exception;

class InvalidOrderException extends Exception
{
    /**
     * Get the exception's context information.
     *
     * @return array
     */
    public function context(): array
    {
        return ['order_id' => 123];
    }
}
