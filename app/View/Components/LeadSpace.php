<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Request;

class LeadSpace extends Component
{
    public $breadcrumbs;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $hostName = $request->getSchemeAndHttpHost();
        
        $currentUrl = $request->url();
        $this->breadcrumbs = explode('/', $currentUrl);
        
        var_dump($currentUrl);
        var_dump($this->breadcrumbs);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.lead-space');
    }
}
