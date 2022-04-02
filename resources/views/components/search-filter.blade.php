<fieldset class="search-filter" x-data="{ open: @js($openByDefault) }">
    <legend class="search-filter__heading">
        <h3>{{ $title }}</h3>
        @if(!$openByDefault)
            <button type="button" @click="open = !open">
                <x-heroicon-s-plus-sm class="search-filter__icon" x-show="!open" />
                <x-heroicon-s-minus-sm class="search-filter__icon" x-show="open" />
            </button>
        @endif
    </legend>
    <div class="search-filter__options" x-show="open">
        {{ $slot }}
    </div>
</fieldset>
