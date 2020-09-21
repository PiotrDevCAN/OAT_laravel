<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $fieldName;
    public $label;
    public $selectedValue;
    public $disabled;
    public $placeholder;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($fieldName = '__REPLACE__', $label = '__REPLACE__', $selectedValue = null, $disabled = false, $placeholder)
    {
        $this->fieldName = $fieldName;
        $this->label = $label;
        $this->selectedValue = $selectedValue;
        $this->disabled = $disabled;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.ibmv18form.input');
    }
}
