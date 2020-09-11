<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LeadSpace extends Component
{
    public $breadcrumbs;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $currentUrl = url()->current();
        $this->breadcrumbs = Str::of($currentUrl)->explode('\');
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
