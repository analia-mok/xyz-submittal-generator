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
     * Keyword search.
     *
     * @var string
     */
    public $search = '';

    /**
     * System type.
     *
     * @var int[]
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

    public function render()
    {
        $testingAuthorities = DB::table('systems')
            ->select('testing_authority')
            ->distinct()
            ->get()
            ->pluck('testing_authority');

        return view('livewire.systems-search', [
            'system_types' => SystemType::all(),
            'barrier_types' => BarrierType::all(),
            'penetrants' => Penetrant::all(),
            'testing_authorities' => $testingAuthorities,
            'f_rating' => FRating::all(),
            't_rating' => TRating::all(),
        ]);
    }

    public function getFiltersProperty()
    {
        // @fixme Computed Property to show a condensed list of filters a user
        // currently has enabled.
        return [
            // $this->lRating !== BooleanOptions::Any ? 'L-Rating: ' . $this->lRating : '',
            // ...$this->fRating,
            // ...$this->tRating,
            // ...$this->systemTypes,
            // ...$this->barrierTypes,
            // ...$this->penetrants,
            // ...$this->testingAuthorities,
        ];
    }

    /**
     * Retrieve user's selections from session.
     *
     * @return SelectedSystems
     */
    public function getSelectedSystemsProperty()
    {
        // Note: Given selectedSystems interacts with a persistent storage,
        // it is not recommended to initialize this Wireable on mount.
        // May cause Livewire\Exceptions\CorruptComponentPayloadException.
        // @see https://laravel-livewire.com/docs/2.x/properties#computed-properties
        return new SelectedSystems();
    }

    public function getResultsProperty()
    {
        $query = System::query();

        $query->when(!empty($this->search), function ($query) {
            return $query->where('name', 'LIKE', "%{$this->search}%");
        });

        $query->when(!empty($this->systemTypes), function ($query) {
            return $query->orWhereIn('system_type_id', $this->systemTypes);
        });

        $query->when(!empty($this->testingAuthorities), function ($query) {
            return $query->orWhereIn('testing_authority', $this->testingAuthorities);
        });

        $query->when(!empty($this->barrierTypes), function ($query) {
            return $query->orWhereIn('barrier_type_id', $this->barrierTypes);
        });

        $query->when(!empty($this->penetrants), function ($query) {
            return $query->orWhereIn('penetrant_id', $this->penetrants);
        });

        $query->when(!empty($this->fRating), function ($query) {
            return $query->orWhereIn('f_rating_id', $this->fRating);
        });

        $query->when(!empty($this->tRating), function ($query) {
            return $query->orWhereIn('t_rating_id', $this->tRating);
        });

        // @fixme
        $query->when($this->lRating !== BooleanOptions::Any, function ($query) {
            return $query->orWhere('l_rating', $this->lRating === BooleanOptions::Yes);
        });

        // @fixme
        $query->when($this->wRating !== BooleanOptions::Any, function ($query) {
            return $query->orWhere('w_rating', $this->wRating === BooleanOptions::Yes);
        });

        return $query->paginate(10);
    }

    public function updatedName($value)
    {
        $this->resetPage();
    }

    public function updatedSystemTypes($value)
    {
        $this->resetPage();
    }

    public function updatedTestingAuthorities($value)
    {
        $this->resetPage();
    }

    public function updatedBarrierTypes($value)
    {
        $this->resetPage();
    }

    public function updatedPenetrants($value)
    {
        $this->resetPage();
    }

    public function updatedLRating($value)
    {
        $this->resetPage();
    }

    public function updatedFRating($value)
    {
        $this->resetPage();
    }

    public function updatedTRating($value)
    {
        $this->resetPage();
    }

    public function updatedWRating($value)
    {
        $this->resetPage();
    }

    /**
     * Removes a system from active selection.
     *
     * Specifically used for the SelectedSystems preview.
     *
     * @param string $id
     */
    public function removeSystem(string $id)
    {
        $this->selectedSystems->removeSystem($id);
    }

    /**
     * Adds or removes a system from active selection.
     *
     * Specifically used for main search results.
     *
     * @param System $system
     */
    public function toggleSystem(System $system)
    {
        if ($this->selectedSystems->hasSystem($system->id)) {
            $this->selectedSystems->removeSystem($system->id);
        } else {
            $this->selectedSystems->addSystem($system);
        }
    }

    public function resetSearch()
    {
        $this->selectedSystems->clear();
        $this->resetPage();
        $this->resetExcept('selectedSystems');
    }
}
