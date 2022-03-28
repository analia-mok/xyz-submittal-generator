<section class="system-search">
    <div class="system-search__column">
        {{-- TODO: Convert filters to accordions --}}
        @if(!empty($system_types))
            <fieldset>
                <legend>
                    <h3>System Types</h3>
                </legend>
                @foreach ($system_types as $type)
                    <label for="system_type_{{ $type->id }}">
                        <input type="checkbox" wire:model="systemTypes" id="system_type_{{ $type->id }}" value="{{ $type->id }}">
                        {{ $type->name }}
                    </label>
                @endforeach
            </fieldset>
        @endif

        @if(!empty($testing_authorities))
            <fieldset>
                <legend>
                    <h3>Testing Authority</h3>
                </legend>
                @foreach ($testing_authorities as $authority)
                    <label for="testing_authority_{{ $authority }}">
                        <input type="checkbox" wire:model="testingAuthorities" id="testing_authority_{{ $authority }}" value="{{ $authority }}">
                        {{ $authority }}
                    </label>
                @endforeach
            </fieldset>
        @endif

        @if(!empty($barrier_types))
            <fieldset>
                <legend>
                    <h3>Barrier Types</h3>
                </legend>
                @foreach ($barrier_types as $type)
                    <label for="barrier_type_{{ $type->id }}">
                        <input type="checkbox" wire:model="barrierTypes" id="barrier_type_{{ $type->id }}" value="{{ $type->id }}">
                        {{ $type->name }}
                    </label>
                @endforeach
            </fieldset>
        @endif

        @if(!empty($penetrants))
            <fieldset>
                <legend>
                    <h3>Penetrant Item</h3>
                </legend>
                @foreach ($penetrants as $type)
                    <label for="penetrant_{{ $type->id }}">
                        <input type="checkbox" wire:model="penetrants" id="penetrant_{{ $type->id }}" value="{{ $type->id }}">
                        {{ $type->name }}
                    </label>
                @endforeach
            </fieldset>
        @endif

        @if(!empty($f_rating))
            <fieldset>
                <legend>
                    <h3>F Rating</h3>
                </legend>
                @foreach($f_rating as $rating)
                    <label for="f_rating_{{ $rating->rating }}">
                        <input type="checkbox" wire:model="fRating" id="f_rating_{{ $rating->rating }}" value="{{ $rating->id }}">
                        {{ $rating->rating }}
                    </label>
                @endforeach
            </fieldset>
        @endif

        <fieldset>
            <legend>
                <h3>L Rating</h3>
            </legend>
            <label for="l_rating_any"><input type="radio" wire:model="lRating" id="l_rating_any" value="any">Any</label>
            <label for="l_rating_yes"><input type="radio" wire:model="lRating" id="l_rating_yes" value="yes">Yes</label>
            <label for="l_rating_no"><input type="radio" wire:model="lRating" id="l_rating_no" value="no">No</label>
        </fieldset>

        @if(!empty($t_rating))
            <fieldset>
                <legend>
                    <h3>T Rating</h3>
                </legend>
                @foreach($t_rating as $rating)
                    <label for="t_rating_{{ $rating->rating }}">
                        <input type="checkbox" wire:model="tRating" id="t_rating_{{ $rating->rating }}" value="{{ $rating->id }}">
                        {{ $rating->rating }}
                    </label>
                @endforeach
            </fieldset>
        @endif

        <fieldset>
            <legend>
                <h3>W Rating</h3>
            </legend>
            <label for="w_rating_any"><input type="radio" wire:model="wRating" id="w_rating_any" value="any">Any</label>
            <label for="w_rating_yes"><input type="radio" wire:model="wRating" id="w_rating_yes" value="yes">Yes</label>
            <label for="w_rating_no"><input type="radio" wire:model="wRating" id="w_rating_no" value="no">No</label>
        </fieldset>

    </div>
    <div class="system-search__column">
        @if(!empty($filters))
            Filters:
            <div class="system-search__filters">
                @foreach($filters as $filter)
                    {{ $filter }}
                @endforeach
            </div>
        @endif
        @if(!empty($systems))
            <strong>Showing {{ ($systems->currentPage() - 1) * $systems->perPage() + 1 }} to {{ min($systems->currentPage() * $systems->perPage(), $systems->total()) }}  out of {{ $systems->total() }}</strong>

            <ul>
                {{-- TODO: Generate proper names in seeded data source --}}
                @foreach ($systems as $system)
                    <li>W-AJ-{{ $system->name }}</li>
                @endforeach
            </ul>

            {{ $systems->links() }}
        @else
            <p>Sorry, no systems could be found</p>
        @endif
    </div>
</section>
