<section class="system-search">
    <div class="system-search__column">

        @if(!$selectedSystems->isEmpty())
            <div class="system-search__selections">
                <strong>Your Selections:</strong>
                <ul class="system-search__selections__items">
                    @foreach ($selectedSystems->all() as $key => $system)
                        <li class="system-search__selections__item">
                            {{ $system }}
                            <button
                                type="button"
                                aria-label="Remove {{ $system }} from your selection"
                                wire:click="removeSystem({{ $key }})"
                            >
                                <x-heroicon-s-trash class="system-search__selections__item__icon" />
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <button type="button" wire:click="resetSearch" class="system-search__selections__reset">Reset Submittal</button>
        @endif

        <label for="search" class="sr-only">Search for systems</label>
        <input type="text" wire:model.debounce.500ms="search" id="search" placeholder="Search for systems">

        @if(!empty($system_types))
            <x-search-filter title="System Types" openByDefault="true">
                @foreach ($system_types as $type)
                    <label for="system_type_{{ $type->id }}">
                        <input type="checkbox" wire:model="systemTypes" id="system_type_{{ $type->id }}" value="{{ $type->id }}">
                        {{ $type->name }}
                    </label>
                @endforeach
            </x-search-filter>
        @endif

        @if(!empty($testing_authorities))
            <x-search-filter title="Testing Authority">
                @foreach ($testing_authorities as $authority)
                    <label for="testing_authority_{{ $authority }}">
                        <input type="checkbox" wire:model="testingAuthorities" id="testing_authority_{{ $authority }}" value="{{ $authority }}">
                        {{ $authority }}
                    </label>
                @endforeach
            </x-search-filter>
        @endif

        @if(!empty($barrier_types))
            <x-search-filter title="Barrier Types">
                @foreach ($barrier_types as $type)
                    <label for="barrier_type_{{ $type->id }}">
                        <input type="checkbox" wire:model="barrierTypes" id="barrier_type_{{ $type->id }}" value="{{ $type->id }}">
                        {{ $type->name }}
                    </label>
                @endforeach
            </x-search-filter>
        @endif

        @if(!empty($penetrants))
            <x-search-filter title="Penetrant Item">
                @foreach ($penetrants as $type)
                    <label for="penetrant_{{ $type->id }}">
                        <input type="checkbox" wire:model="penetrants" id="penetrant_{{ $type->id }}" value="{{ $type->id }}">
                        {{ $type->name }}
                    </label>
                @endforeach
            </x-search-filter>
        @endif

        @if(!empty($f_rating))
            <x-search-filter title="F-Rating">
                @foreach($f_rating as $rating)
                    <label for="f_rating_{{ $rating->rating }}">
                        <input type="checkbox" wire:model="fRating" id="f_rating_{{ $rating->rating }}" value="{{ $rating->id }}">
                        {{ $rating->rating }}
                    </label>
                @endforeach
            </x-search-filter>
        @endif

        <x-search-filter title="L-Rating">
            <label for="l_rating_any"><input type="radio" wire:model="lRating" id="l_rating_any" value="any">Any</label>
            <label for="l_rating_yes"><input type="radio" wire:model="lRating" id="l_rating_yes" value="yes">Yes</label>
            <label for="l_rating_no"><input type="radio" wire:model="lRating" id="l_rating_no" value="no">No</label>
        </x-search-filter>

        @if(!empty($t_rating))
            <x-search-filter title="T-Rating">
                @foreach($t_rating as $rating)
                    <label for="t_rating_{{ $rating->rating }}">
                        <input type="checkbox" wire:model="tRating" id="t_rating_{{ $rating->rating }}" value="{{ $rating->id }}">
                        {{ $rating->rating }}
                    </label>
                @endforeach
            </x-search-filter>
        @endif

        <x-search-filter title="W-Rating">
            <label for="w_rating_any"><input type="radio" wire:model="wRating" id="w_rating_any" value="any">Any</label>
            <label for="w_rating_yes"><input type="radio" wire:model="wRating" id="w_rating_yes" value="yes">Yes</label>
            <label for="w_rating_no"><input type="radio" wire:model="wRating" id="w_rating_no" value="no">No</label>
        </x-search-filter>
    </div>
    <div class="system-search__column">
        @if(!empty($this->filters))
            Filters:
            <div class="system-search__filters">
                @foreach($this->filters as $filter)
                    {{ $filter }}
                @endforeach
            </div>
        @endif
        @if(!empty($this->results) && $this->results->total() !== 0)
            <strong>Showing {{ ($this->results->currentPage() - 1) * $this->results->perPage() + 1 }} to {{ min($this->results->currentPage() * $this->results->perPage(), $this->results->total()) }}  out of {{ $this->results->total() }}</strong>

            @foreach ($this->results as $system)
                <x-system-card :system="$system" :isSelected="$selectedSystems->hasSystem($system->id)" />
            @endforeach

            {{ $this->results->links() }}
        @else
            <p>Sorry, no systems could be found</p>
        @endif
    </div>
</section>
