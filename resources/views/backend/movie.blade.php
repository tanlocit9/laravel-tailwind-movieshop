@extends('layouts.admin')

@section('content')
<!-- strat content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <!-- best seller & traffic -->
        <div class="grid grid-cols-1 gap-5">
            <div class="card">
                <div class="card-body">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="font-extrabold text-lg">movies info</h1>
                        {{-- @include('components.modal',['action'=>'Add','title'=>$title]) --}}
                    </div>
                    <div id="datatable" class="z-0">
                        <livewire:datatables-movie exportable />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{--
<div class="grid grid-cols-1 gap-5">
    <div class="card">
        <div class="card-body">
            <div class="flex flex-row justify-between items-center">
                <h1 class="font-extrabold text-lg">movies info</h1>
                @include('components.modal',['action'=>'Add','title'=>$title])
            </div>
            <div>
            <table class="w-full mt-5 text-center">
                <thead>
                    <tr class="divide-y divide-x divide-red-800 text-center">
                        <th hidden></th>
                        <th>Title</th>
                        <th>duration</th>
                        <th>release date</th>
                        <th>country</th>
                        <th>age limit</th>
                        <th class="w-2/6 m-0 ">description</th>
                        <th>average rate</th>
                        <th>main genre</th>
                        <th class="invisible"></th>
                    </tr>
                </thead>
                <tbody class="text-sm normal-case">
                    @foreach($movies as $movie)
                    <tr class="capitalize divide-y divide-x divide-red-800">
                        <td hidden></td>
                        <td>{{$movie->title}}</td>
                        <td>{{$movie->duration}}</td>
                        <td>{{$movie->release_date}}</td>
                        <td>{{$movie->country->country_name}}</td>
                        <td>{{$movie->age_limit}}</td>
                        <td class="line-clamp-2 hover:line-clamp-none mx-auto hover:text-red-500 break-normal text-left">
                            {{$movie->description}}
                        </td>
                        @if($movie->avg_rate())
                        <td>
                            {{$movie->avg_rate()}}
                        </td>
                        @else
                        <td>
                            Not Rated
                        </td>
                        @endif
                        <td>
                            {{$movie->main_genre->first()->genre_name}}
                        </td>
                        <td class="invisible"></td>
                    </tr>
                    @endforeach
                    <tr class="invisible"></tr>
                </tbody>
            </table>
        </div>
            <div>
                {{$movies->links()}}
            </div>
        </div>
    </div> --}}
