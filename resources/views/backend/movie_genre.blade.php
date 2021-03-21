@extends('layouts.admin')

@section('content')
<!-- strat content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <!-- best seller & traffic -->
    <div class="grid grid-cols-1 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-extrabold text-lg">Movies - Genres</h1>
                    @include('components.modal',['action'=>'Modify','title'=>$title])
                </div>
                <div>
                    <livewire:datatables-movie-genre searchable="title" exportable/>
                </div>
                {{-- <table class="text-left w-full mt-5 ">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>Main Genre</th>
                            <th>Sub Genres</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        @forelse($movies as $movie)
                        <tr class="capitalize">
                            <td>{{$movie->title}}</td>
                            <td>
                                {{$movie->main_genre->first()->genre_name}}
                            </td>
                            <td>
                                @forelse($movie->sub_genre as $genre)
                                    @if ($loop->last)
                                        {{$genre->genre_name}}.
                                    @else {{$genre->genre_name}},
                                    @endif
                                @empty
                                    Movie doesn't have sub genres.
                                @endforelse
                            </td>
                            <td>Modify</td>
                            @empty
                            We don't have any movies.
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{$movies->links()}}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
