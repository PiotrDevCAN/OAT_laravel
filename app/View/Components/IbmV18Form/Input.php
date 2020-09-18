<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;
use App\Request;
use Illuminate\Database\Eloquent\Model;

class Input extends Component
{
    public $model;
    public $fieldName;
    public $label;
    public $disabled;
    public $placeholder;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    
//     function formInput($title, $fieldName, $state = null, $size = '20', $class = 'col-md-9', $help = null, $width = '30%', $onchange = null, $colspan = '1', $linkWidth = '70%', $dataPlacement = 'top', $typeAttribute = 'text')
    
    public function __construct(Model $model = null, $fieldName = null, $label = null, $disabled = false, $placeholder = null)
    {
        $this->model = $model;
        $this->fieldName = $fieldName;
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
