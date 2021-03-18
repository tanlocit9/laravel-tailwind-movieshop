@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-10">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg text-semibold">
                Popular Movies
            </h2>
            {{-- Grid --}}
            <div class="grid grid-cols-4 gap-4">
                @foreach($movies as $movie)
                {{-- Card --}}
                <div class="mt-6">
                    <a href="{{route('show_movie',$movie)}}">
                        <img src="{{asset('storage/img')}}/{{$movie->poster}}" alt="{{$movie->title}}" class="w-64">
                    </a>
                    <div class="mt-2">
                    <a href="{{route('show_movie',$movie)}}" class="text-lg mt-2 hover:text-gray-300">{{$movie->title}}</a>
                    </div>
                    {{-- Movie Info --}}
                    <div >
                        <img class="inline text-orange-500 w-4 h-4 mb-1" src="/storage/img/star.png" alt="star">
                        <span>85%</span>
                        <span>|</span>
                        <span>{{$movie->release_date}}</span>
                    </div>
                    <div class="inline">
                        @forelse($movie->sub_genre as $genre)
                            @if ($loop->last)
                                {{$genre->genre_name}}.
                            @else {{$genre->genre_name}},
                            @endif
                        @empty
                            Movie doesn't have sub genres.
                        @endforelse
                    </div>
                    {{-- End Movie Info --}}
                </div>
                {{-- End Card --}}
                @endforeach
            </div>
            {{-- End Grid --}}
        </div>
    </div>
@endsection

