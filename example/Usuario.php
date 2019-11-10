<?php

use FilterCreator\FilterSelect;
use \FilterCreator\Contracts\IFilter;

class Usuario extends FilterSelect implements IFilter
{
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->label = 'Usuário: ';
    }
}