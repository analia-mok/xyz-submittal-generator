<?php

namespace App\Http\Livewire;

use App\Enums\BooleanOptions;
use App\Http\Livewire\Wireable\SelectedSystems;
use App\Models\BarrierType;
use App\Models\FRating;
use App\Models\Penetrant;
use App\Models\System;
use App\Models\SystemType;
use App\Models\TRating;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SystemsSearch extends Component
{
    use WithPagination;

    /**
     * User's selected systems.
     *
     * @var SelectedSystems
     */
    public SelectedSystems $selectedSystems;

    /**
     * Keyword search.
     *
     * @var string
     */
    public $search;

    /**
     * System type.
     *
     * @var string[]
     */
    public $systemTypes = [];

    /**
     * Testing authorities.
     *
     * @var string[]
     */
    public $testingAuthorities = [];

    /**
     * Barrier Material Types.
     *
     * @var string[]
     */
    public $barrierTypes = [];

    /**
     * Penetrant material types.
     *
     * @var string[]
     */
    public $penetrants = [];

    /**
     * UL - F Rating.
     *
     * @var string[]
     */
    public $fRating = [];

    /**
     * UL - L Rating.
     *
     * @var string
     */
    public $lRating = BooleanOptions::Any;

    /**
     * UL - T Rating.
     *
     * @var string[]
     */
    public $tRating = [];

    /**
     * UL - W Rating.
     *
     * @var string
     */
    public $wRating = BooleanOptions::Any;

    protected $listeners = [
        'systemToggle' => 'toggleSystem',
    ];

    public function mount()
    {
        $systems = [];
        if (session()->has('selected_systems')) {
            $systems = session()->get('selected_systems');
        }

        $this->selectedSystems = new SelectedSystems($systems);
    }

    public function render()
    {
        $systems = System::all();

        // @todo Either hardcode/enum or switch to pluck from all systems.
        // Will only show results for the current page.
        $testingAuthorities = $systems->pluck('testing_authority')->unique();

        $filteredSystems = [];

        // @todo Figure out how to flexibly chain query builder.
        $query = System::where('l_rating', true);
        // $query->orWhere('w_rating', $this->wRating);

        if (!empty($this->systemTypes)) {
            $query->orWhereIn('system_type_id', $this->systemTypes);
        }

        if (!empty($this->barrierTypes)) {
            $query->orWhereIn('barrier_type_id', $this->barrierTypes);
        }

        if (!empty($this->penetrants)) {
            $query->orWhereIn('penetrant_id', $this->penetrants);
        }

        if (!empty($this->testing_authorities)) {
            $query->orWhereIn('testing_authority', $this->testingAuthorities);
        }

        return view('livewire.systems-search', [
            'systems' => System::paginate(10),
            'system_types' => SystemType::all(),
            'barrier_types' => BarrierType::all(),
            'penetrants' => Penetrant::all(),
            'testing_authorities' => $testingAuthorities,
            'f_rating' => FRating::all(),
            't_rating' => TRating::all(),
            // 'filters' => [...$this->fRating],
        ]);
    }

    public function toggleSystem(System $system)
    {
        if ($this->selectedSystems->hasSystem($system->id)) {
            $this->selectedSystems->removeSystem($system->id);
        } else {
            $this->selectedSystems->addSystem($system);
        }

        // TODO: Optimize this better?
        session(['selected_systems' => $this->selectedSystems->systems]);
    }
}
