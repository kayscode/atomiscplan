<?php

namespace App\Exceptions\Models;

class ModelNotFoundException extends \Exception
{
    public function __construct(string $message = "Model Not Found", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
