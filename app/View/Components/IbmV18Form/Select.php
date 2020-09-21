<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;
use App\Request;
use Illuminate\Database\Eloquent\Model;

class Select extends Component
{
    public static $selectDisplayValueReturnValue = 'displayValueReturnValue';
    public static $selectDisplayValueReturnKey   = 'displayValueReturnKey';
    public static $selectDisplayKeyReturnValue   = 'displayKeyReturnValue';
    public static $selectDisplayKeyReturnKey     = 'displayKeyReturnKey';
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
        $allowMultipleSelections = is_array($model->$fieldName);
        $wayToHandleArray = empty($wayToHandleArray) ? self::$selectDisplayValueReturnValue : $wayToHandleArray;
        $selectedValues = $allowMultipleSelections ? $model->$fieldName : array($model->$fieldName => $model->$fieldName);
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
    public function isSelected($option)
    {
        return $option === $model->selected;
    }
    
    /**
     * Determine if the given option is the current disabled option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isDisabled($option)
    {
        return $option === $model->fieldName;
    }
    
    public function prepareOption($key, $value)
    {
        switch ($this->wayToHandleArray) {
            case self::$selectDisplayValueReturnKey:
                $this->displayValue = trim($value);
                $this->returnValue  = trim($key);
                break;
            case self::$selectDisplayKeyReturnValue:
                $this->displayValue = trim($key);
                $this->returnValue  = trim($value);
                break;
            case self::$selectDisplayKeyReturnKey:
                $this->displayValue = trim($key);
                $this->returnValue  = trim($key);
                break;
            case self::$selectDisplayValueReturnValue:
            default:
                $this->displayValue = trim($value);
                $this->returnValue  = trim($value);
                break;
        }
    }
    
    public function getDisplayValue($key, $value)
    {
        $this->prepareOption($key, $value);
        
        return $this->displayValue;
    }
    
    public function getReturnValue($key, $value)
    {
        $this->prepareOption($key, $value);
        
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
