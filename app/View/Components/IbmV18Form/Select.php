<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;

class Select extends Component
{
    public $selectDisplayValueReturnValue = 'displayValueReturnValue';
    public $selectDisplayValueReturnKey   = 'displayValueReturnKey';
    public $selectDisplayKeyReturnValue   = 'displayKeyReturnValue';
    public $selectDisplayKeyReturnKey     = 'displayKeyReturnKey';
    public $selectAcceptMultipleValues    = true;
    
    public $wayToHandleArray;
    public $arrayOfSelectableValues;
    public $label;
    public $fieldName;
    public $readonly;
    public $classCSS;
    public $onChange;
    public $placeHolder;
    public $arrayOfDisabledValues;
    public $selectedValues;
    
    public $selected;
    public $disabled;
    
    public $displayValue = 'initial';
    public $returnValue = 'initial';
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($wayToHandleArray = null, $arrayOfSelectableValues = array(), $label = null, $fieldName = null, $readonly = false, $classCSS = null, $onChange = null,   $placeHolder = 'Select...', $arrayOfDisabledValues = array())
    {
        $allowMultipleSelections = false;
        $wayToHandleArray = empty($wayToHandleArray) ? $this->selectDisplayValueReturnValue : $wayToHandleArray;
//         $selectedValues = $allowMultipleSelections ? $model->$fieldName : array($model->$fieldName => $model->$fieldName);
        $selectedValues = null;
        $disabled = ($readonly) ? ' disabledSelect ' : null;
        
        $this->wayToHandleArray = $wayToHandleArray;
        $this->arrayOfSelectableValues = $arrayOfSelectableValues;
        $this->label = $label;
        $this->fieldName = $fieldName;
        $this->readonly = $readonly;
        $this->classCSS = $classCSS;
        $this->onChange = $onChange;
        $this->placeHolder = $placeHolder;
        $this->arrayOfDisabledValues = $arrayOfDisabledValues;
        $this->selectedValues = $selectedValues;
    }
    
    /**
     * Determine if the given option is the current selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isSelected($item)
    {
        foreach ($item as $key => $value) {
//             if ($value == $model->selected) {
                
//             } else {
//                 return false;
//             }
            return false;
        }
    }
    
    /**
     * Determine if the given option is the current disabled option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isDisabled($item)
    {
        foreach ($item as $key => $value) {
//             if ($value == $model->selected) {
//                 return true;
//             } else {
//                 return false;
//             }
            return false;
        }
    }
    
    public function prepareOption($item)
    {
        foreach ($item as $key => $value) {
            switch ($this->wayToHandleArray) {
                case $this->selectDisplayValueReturnKey:
                        $this->displayValue = trim($value);
                        $this->returnValue  = trim($key);
                    break;
                case $this->selectDisplayKeyReturnValue:
                        $this->displayValue = trim($key);
                        $this->returnValue  = trim($value);
                    break;
                case $this->selectDisplayKeyReturnKey:
                        $this->displayValue = trim($key);
                        $this->returnValue  = trim($key);
                    break;
                case $this->selectDisplayValueReturnValue:
                default:
                        $this->displayValue = trim($value);
                        $this->returnValue  = trim($value);
                    break;
            }
        }
    }
    
    public function getDisplayValue($value)
    {
        $this->prepareOption($value);
        
        return $this->displayValue;
    }
    
    public function getReturnValue($value)
    {
        $this->prepareOption($value);
        
        return $this->returnValue;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.ibmv18form.select');
    }
}
