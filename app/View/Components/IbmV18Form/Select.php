<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;
use App\Request;

class Select extends Component
{
    public $selectDisplayValueReturnValue = 'displayValueReturnValue';
    public $selectDisplayValueReturnKey   = 'displayValueReturnKey';
    public $selectDisplayKeyReturnValue   = 'displayKeyReturnValue';
    public $selectAcceptMultipleValues    = true;
    
    public $model;
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
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model = null, $wayToHandleArray = null, $arrayOfSelectableValues, $label, $fieldName, $readonly = false, $classCSS = null, $onChange = null,   $placeHolder = 'Select...', $arrayOfDisabledValues = array())
    {
        
        echo '$wayToHandleArray';
        dump($wayToHandleArray);
        echo '$arrayOfSelectableValues';
        dump($arrayOfSelectableValues);
        
        $allowMultipleSelections = is_array($model->$fieldName);
        $wayToHandleArray = empty($wayToHandleArray) ? self::$selectDisplayValueReturnValue : $wayToHandleArray;
        $selectedValues = $allowMultipleSelections ? $model->$fieldName : array($model->$fieldName => $model->$fieldName);
        $disabled = ($readonly) ? ' disabledSelect ' : null;
        
        $this->model = $model;
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
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.ibmv18form.select');
    }
}
