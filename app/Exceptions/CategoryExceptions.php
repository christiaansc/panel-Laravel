<?php

namespace App\Exceptions;

use Exception;

class CategoryExceptions extends Exception
{
    public function __construct($message = "Error en el servicio de categorías", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
