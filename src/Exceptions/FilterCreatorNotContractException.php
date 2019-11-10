<?php

namespace FilterCreator\Exceptions;

use Exception;

class FilterCreatorNotContractException extends Exception
{
    const MESSAGE = 'The filter does not comply with the contract. IFilter contract required';
    const CODE = '1';

    public function __construct()
    {
        parent::__construct(self::MESSAGE, self::CODE, null);
    }
}