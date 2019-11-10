<?php

use FilterCreator\FilterInput;
use \FilterCreator\Contracts\IFilter;

class Endereco extends FilterInput implements IFilter
{
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->label = 'Endereco: ';
    }
}