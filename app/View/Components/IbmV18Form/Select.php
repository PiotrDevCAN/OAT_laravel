<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;
use App\Request;

class Select extends Component
{
    public $name;
    public $label;
    public $arrayOfSelectableValues;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $arrayOfSelectableValues)
    {
        $this->name = $name;
        $this->label = $label;
        $this->arrayOfSelectableValues = $arrayOfSelectableValues;
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
