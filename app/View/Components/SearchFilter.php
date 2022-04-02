<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchFilter extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $title
     * @return void
     */
    public function __construct(
        public string $title,
        public $openByDefault = false,
    ) { }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search-filter');
    }
}
