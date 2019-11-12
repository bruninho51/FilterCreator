<?php

namespace FilterCreator\Exceptions;

use Exception;

class FilterCreatorInvalidAttachmentException extends Exception
{
    const MESSAGE = 'Attached attachment is not supported';
    const CODE = '2';

    public function __construct()
    {
        parent::__construct(self::MESSAGE, self::CODE, null);
    }
}