<?php

namespace App\View\Components\Log;

use Illuminate\View\Component;
use App\Request;

class Filters extends Component
{
    
    public $logEntries;
    public $lastUpdates;
    public $lastUpdaters;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->logEntries = \App\Log::select('log_entry as value')
            ->where('log_entry', '<>', '')
            ->distinct()
            ->get();
        
        $this->lastUpdates = \App\Log::select('last_updater as value')
            ->where('last_updater', '<>', '')
            ->distinct()
            ->get();
        
        $this->lastUpdaters = \App\Log::select('last_updated as value')
            ->where('last_updated', '<>', '')
            ->distinct()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.log.filters');
    }
}
