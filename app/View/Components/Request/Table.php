<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;

class Table extends Component
{
    /**
     * The table name.
     *
     * @var string
     */
    public $name;
    
    /**
     * The table id.
     *
     * @var string
     */
    public $id;
    
    /**
     * The table label.
     *
     * @var string
     */
    public $label;
    
    /**
     * The table content.
     *
     * @var string
     */
    public $records;
    
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
//         $this->name = $name;
//         $this->id = $id;
//         $this->label = $label;
//         $this->records = $records;
//         $this->expand = $expand;
     
        $this->list = $list;        
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
