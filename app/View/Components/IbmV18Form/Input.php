<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $fieldName;
    public $label;
    public $disabled;
    public $placeholder;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($selectedValue = null, $fieldName = null, $label = null, $disabled = false, $placeholder = null)
    {
        $this->fieldName = $fieldName;
        $this->selectedValue = $selectedValue;
        $this->label = $label;
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
