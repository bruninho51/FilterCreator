<?php


namespace FilterCreator;


use FilterCreator\Contracts\IFilter;

abstract class FilterInput extends BaseFilter implements IFilter
{
    public function setType(String $type) : void
    {
        $this->type = $type;
    }

    /**
     * Retorna uma matriz com os dados do filtro
     * @param array $filters
     * @return array
     */
    public function getData(array $filters = []): \ArrayObject
    {
        return new \ArrayObject();
    }

    public function mount(): String
    {
        $html = '';
        $classes = implode(' ', (array) $this->classes);
        $value = '';
        if ($this->getValues()->count() > 0) {
            $value = $this->getValues()->offsetGet(0) ?: '';
        }
        $label = $this->createLabel ? "<label for='{$this->name}'>{$this->label}</label>" : '';
        $placeholder = !$label ? $this->label : '';
        $html .= $label;
        $html .= "<input 
                    type='{$this->type}' 
                    id='{$this->id}' 
                    name='{$this->name}' 
                    $classes='{$classes}'
                    placeholder='{$placeholder}'
                    value='{$value}'>";

        return $html;
    }
}