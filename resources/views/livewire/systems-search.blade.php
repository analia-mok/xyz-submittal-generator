<section>
    @if(!empty($systems))
        <strong>Showing {{ ($systems->currentPage() - 1) * $systems->perPage() + 1 }} to {{ min($systems->currentPage() * $systems->perPage(), $systems->total()) }}  out of {{ $systems->total() }}</strong>

        <ul>
            {{-- TODO: Generate proper names in seeded data source --}}
            @foreach ($systems as $system)
                <li>W-AJ{{ $system->name }}</li>
            @endforeach
        </ul>

        {{ $systems->links() }}
    @else
        <p>Sorry, no systems could be found</p>
    @endif
</section>
