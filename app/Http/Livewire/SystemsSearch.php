<?php

namespace App\Http\Livewire;

use App\Models\System;
use Livewire\Component;
use Livewire\WithPagination;

class SystemsSearch extends Component
{
    use WithPagination;

    public function render()
    {
        $systems = System::paginate(10);
        return view('livewire.systems-search', [
            'systems' => $systems,
        ]);
    }
}
