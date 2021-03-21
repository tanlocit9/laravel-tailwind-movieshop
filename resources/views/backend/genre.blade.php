@extends('layouts.admin')

@section('content')
<!-- strat content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <!-- best seller & traffic -->
    <div class="grid grid-cols-1 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-extrabold text-lg">Genres available</h1>
                    @include('components.modal',['action'=>'Add','title'=>$title])
                </div>
                <livewire:datatables-genre searchable="genre_name" exportable/>
                {{-- <table class="text-left w-full mt-5 ">
                    <thead>
                        <tr>
                            <th>Genre name</th>
                            <th>Genre description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        @foreach($genres as $genre)
                        <tr class="capitalize">
                            <td>{{$genre->genre_name}}</td>
                            <td>{{$genre->genre_description}}</td>
                            <td>Modify</td>
                        <tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$genres->links()}}
                </div> --}}
            </div>
        </div>

    </div>
</div>

@endsection

