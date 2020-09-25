<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $fieldName;
    public $value;
    public $options;
    public $label;
    public $labelOptions;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldName, $value = null, $label = '')
    {
        $this->fieldName = $fieldName;
        $this->value = $value;
        $this->options = array(
            'rows' => '50',
            'cols' => '30',
            'class' => 'form-control', 
            'id' => $fieldName,
            'maxLength' => '500',
            'placeholder' => null
        );
        $this->label = $label;
        $this->labelOptions = array(
            'class' => 'ibm-column-field-label ibm-bold'
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.ibmv18form.textarea');
    }
}
