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
                    class='{$classes}'
                    value='{$this->title}'
                    data-route='{$this->route}'
                    onclick='{$this->script}'>";

        return $html;
    }
}