<span class="mx-4 my-2 bg-pink-500">
    @forelse(Movie::find($value)->sub_genre as $genre)
    @if ($loop->last)
        {{$genre->genre_name}}.
        @else {{$genre->genre_name}},
        @endif
    @empty
        Movie doesn't have sub genres.
    @endforelse
</span>
