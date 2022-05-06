<article class="system-card">
    <div class="system-card__column">
        <label for="system_{{ $system->id }}" class="sr-only">Add {{ $system->name }} to your selection</label>
        <input type="checkbox" wire:click="$emitUp('systemToggle', {{ $system }})" id="system_{{ $system->id }}" value="{{ $system->id }}" {{ $isSelected ? 'checked' : '' }}>
    </div>
    <div class="system-card__column system-card__content">
        <header>
            {{-- TODO: Change more info icon into a button --}}
            <h3 class="system-card__heading">{{ $system->name }} <x-heroicon-s-information-circle /></h3>
        </header>
        @if(!empty($system->description))
            <p>
                {{ $system->description }}
            </p>
        @endif
        {{-- TODO: Download link --}}
        <a href="#" target="_blank" class="system-card__download-link">Download <x-heroicon-s-download /></a>
    </div>
</article>
