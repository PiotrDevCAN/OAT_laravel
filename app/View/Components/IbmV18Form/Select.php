<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;
use App\Request;

class Select extends Component
{
    public $name;
    public $label;
    public $arrayOfSelectableValues;
    public $selectedValue;
    
    public static $selectDisplayValueReturnValue = 'displayValueReturnValue';
    public static $selectDisplayValueReturnKey   = 'displayValueReturnKey';
    public static $selectDisplayKeyReturnValue   = 'displayKeyReturnValue';
    public static $selectAcceptMultipleValues    = true;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $arrayOfSelectableValues, $selectedValue = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->arrayOfSelectableValues = $arrayOfSelectableValues;
        $this->selectedValue = $selectedValue;
    }
    
    /*
    public function __construct($wayToHandleArray=null, $arrayOfSelectableValues, $label, $fieldName, $readonly=false, $class = null, $onChange = null,   $placeHolder = 'Select...', $arrayOfDisabledValues=array())
    {
        
        $allowMultipleSelections = is_array($this->$fieldName);
        $wayToHandleArray = empty($wayToHandleArray) ? self::$selectDisplayValueReturnValue : $wayToHandleArray;
        $selectedValues = $allowMultipleSelections ? $this->$fieldName : array($this->$fieldName => $this->$fieldName);
        $disabled = ($readonly or ($this->mode == FormClass::$modeDISPLAY)) ? ' disabledSelect ' : null;
        
        $this->name = $name;
        $this->label = $label;
        $this->arrayOfSelectableValues = $arrayOfSelectableValues;
        $this->selectedValue = $selectedValue;
    }
    */

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
