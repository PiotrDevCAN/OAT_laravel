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
    public $attributes;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($fieldName = null, $label = null, $selectedValue = null, $disabled = false, $placeholder = null)
    {
        $this->fieldName = $fieldName;
        $this->label = $label;
        $this->selectedValue = $selectedValue;
        $this->disabled = $disabled;
        $this->placeholder = $placeholder;
        $this->attributes = array(
            'size' => '40',
            'placeholder' => $placeholder,
            'disabled' => $disabled
        );
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
