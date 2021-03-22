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
                <livewire:datatables-movie-actor exportable/>
                {{-- <table class="text-left w-full mt-5 ">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>Director</th>
                            <th>Cast</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        @forelse($movies as $movie)
                        <tr class="capitalize">
                            <td>{{$movie->title}}</td>
                            <td>
                                @foreach($movie->main_actor as $actor)
                                        @if ($loop->last)
                                        {{$actor->full_name}}.
                                        @else {{$actor->full_name}},
                                        @endif
                                @endforeach
                                </td>
                            <td>
                                @foreach($movie->sub_actor as $actor)
                                    @if ($loop->last)
                                    {{$actor->full_name}}.
                                    @else {{$actor->full_name}},
                                    @endif
                                @endforeach
                            </td>
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
