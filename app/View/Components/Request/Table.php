<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;

class Table extends Component
{
    /**
     * The table.
     *
     * @var array
     */
    public $list;
    
    public $expand;
    
    /**
     * Create the component instance.
     *
     * @param  string  $name
     * @param  string  $records
     * @return void
     */
    public function __construct($list = null, $expand = false)
    {
        $this->list = $list;
        $this->expand = $expand;      
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.request.table');
    }
}
