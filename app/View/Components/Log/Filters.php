<?php

namespace App\View\Components\Log;

use Illuminate\View\Component;
use App\Log;

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
        $this->logEntries = Log::select('log_entry')
            ->where('log_entry', '<>', '')
            ->distinct()
            ->limit(100)
            ->get();
        
        $this->lastUpdates = Log::select('last_updater')
            ->where('last_updater', '<>', '')
            ->distinct()
            ->limit(100)
            ->get();
        
        $this->lastUpdaters = Log::select('last_updated')
            ->distinct()
            ->limit(100)
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
