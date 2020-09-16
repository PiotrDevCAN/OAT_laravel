<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;
use App\Request;

class Input extends Component
{
    public $name;
    public $label;
    public $value;
    public $disabled;
    public $placeholder;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = null, $label = null, $value = null, $disabled = false, $placeholder = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
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
