<?php

namespace App\View\Components;

use App\Models\System;
use Illuminate\View\Component;

class SystemCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @param System $system
     */
    public function __construct(
        public System $system,
        public $isSelected = false,
    ) { }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.system-card');
    }
}
