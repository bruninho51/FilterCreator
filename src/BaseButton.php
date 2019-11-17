<?php


namespace FilterCreator;


abstract class BaseButton
{
    protected $name;
    protected $title;
    protected $id;
    protected $classes;
    protected $route;
    protected $script;

    public function __construct($title)
    {
        $this->classes = new \ArrayObject();
        $this->title = $title;
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

    public function setScript($script)
    {
        $this->script = $script;
    }

    public function setRoute($route)
    {
        $this->route = $route;
    }
}