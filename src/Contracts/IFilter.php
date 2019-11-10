<?php


namespace FilterCreator\Contracts;


interface IFilter
{
    /**
     * Retorna uma matriz com os dados do filtro
     * @param array $filters
     * @return array
     */
    public function getData(array $filters = []) : \ArrayObject;

    /**
     * Retorna o HTML do filtro
     * @return String
     */
    public function mount() : String;
}