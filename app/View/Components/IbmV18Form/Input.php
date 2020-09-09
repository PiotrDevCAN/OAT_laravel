<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;
use App\Request;

class Input extends Component
{
    public $name;
    public $label;
    public $disabled;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $disabled = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->disabled = $disabled;
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
