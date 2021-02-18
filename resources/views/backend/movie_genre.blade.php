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
                <table class="text-left w-full mt-5 ">
                    <thead>
                        <tr>
                            <th>Movie name</th>
                            <th>Main Genre</th>
                            <th>Sub Genres</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        @foreach($movies as $movie)
                        <tr class="capitalize">
                            <td>{{$movie->movie_name}}</td>
                            <td>{{$movie->main_genre->first()->genre_name}}</td>
                            <td>
                                @forelse($movie->sub_genre as $genre)
                                    $genre->genre_name
                                @empty
                                    Movie doesn't have sub Genres
                                @endforelse
                            </td>
                            <td>Modify</td>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$movies->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

