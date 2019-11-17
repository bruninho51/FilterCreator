<?php


namespace FilterCreator;

class ButtonAction extends BaseButton
{
    public function mount(): String
    {
        $html = '';
        $classes = implode(' ', (array) $this->classes);
        $html .= "<input 
                    type='button' 
                    id='{$this->id}' 
                    name='{$this->name}' 
                    $classes='{$classes}'
                    value='{$this->title}'
                    data-controller='{$this->controller}'
                    data-method='{$this->method}'
                    onclick='{$this->script}'>";

        return $html;
    }
}