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
     * The table content.
     *
     * @var string
     */
    public $records;
    
    public $expand;
    
    /**
     * Create the component instance.
     *
     * @param  string  $name
     * @param  string  $records
     * @return void
     */
    public function __construct($name, $id, $records, $expand = false)
    {
        $this->name = $name;
        $this->id = $id;
        $this->records = $records;
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
