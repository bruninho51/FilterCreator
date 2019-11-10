<?php


namespace FilterCreator;


use FilterCreator\Contracts\IFilter;

abstract class FilterSelect extends BaseFilter implements IFilter
{
    public function __construct($config)
    {
        parent::__construct($config);
        $this->type = 'select';
    }

    /**
     * Exemplo de getData
     * @param array $filters
     * @return array
     */
    public function getData(array $filters = []) : \ArrayObject
    {
        $arr = new \ArrayObject();

        $option1 = new \stdClass();
        $option1->name     = 'John';
        $option1->value    = '1';
        $option1->selected = false;
        $arr->append($option1);

        $option2 = new \stdClass();
        $option2->name     = 'Marta';
        $option2->value    = '2';
        $option2->selected = false;
        $arr->append($option2);

        $option3 = new \stdClass();
        $option3->name     = 'Josef';
        $option3->value    = '3';
        $option3->selected = true;
        $arr->append($option3);

        return $arr;
    }

    public function mount(): String
    {
        $html = '';
        $classes = implode(' ', (array) $this->classes);
        $label = $this->createLabel ? "<label for='{$this->name}'>{$this->label}</label>" : '';
        $placeholder = !$label ? "<option value='' disabled selected>{$this->label}</option>" : '';
        $html .= $label;
        $html .= "<select
                    id='{$this->id}' 
                    name='{$this->name}' 
                    $classes='{$classes}'
                  >{$placeholder}";

        $iterator = $this->getData()->getIterator();
        while ($iterator->valid()) {
            $arrOption = $iterator->current();
            $selected = in_array($arrOption->value, (array) $this->values) ? 'selected' : '';
            $option = "<option value='{$arrOption->value}' $selected>{$arrOption->name}</option>";
            $html .= $option;

            $iterator->next();
        }

        $html .= '</select>';

        return $html;
    }
}