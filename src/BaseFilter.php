<?php


namespace FilterCreator;


abstract class BaseFilter
{
    protected $name;
    protected $id;
    protected $classes;
    protected $config;
    protected $type;
    protected $values;
    protected $label;
    protected $createLabel;

    public function __construct($config)
    {
        $this->config = $config;
        $this->values = new \ArrayObject();
        $this->classes = new \ArrayObject();
        $this->createLabel = true;
    }

    /**
     * Adiciona uma classe a um componente
     * @param String $className
     */
    public function addClass(String $className) : void
    {
        $this->classes[] = $className;
    }

    /**
     * Atribui um id para o componente
     * @param String $id
     */
    public function setId(String $id) : void
    {
        $this->id = $id;
    }

    /**
     * Atribui o name do componente
     * @param String $name
     */
    public function setName(String $name) : void
    {
        $this->name = $name;
    }

    public function getValues() : \ArrayObject
    {
        return $this->values;
    }
}