<?php

namespace App\View\Components\Delegate;

use Illuminate\View\Component;
use App\Delegate;

class Filters extends Component
{
    
    public $userIntranets;
    public $delegateIntranets;
    public $delegateNotesIds;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userIntranets = Delegate::select('user_intranet')
            ->where('user_intranet', '<>', '')
            ->distinct()
            ->get();
        
        $this->delegateIntranets = Delegate::select('delegate_intranet')
            ->where('delegate_intranet', '<>', '')
            ->distinct()
            ->get();
        
        $this->delegateNotesIds = Delegate::select('delegate_notesid')
            ->where('delegate_notesid', '<>', '')
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
        return view('components.delegate.filters');
    }
}
