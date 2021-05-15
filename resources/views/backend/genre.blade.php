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
                    {{-- @include('components.modal',['action'=>'Add','title'=>$title]) --}}
                </div>
                <livewire:backend.datatable.d-t-genre searchable="genre_name" exportable/>
            </div>
        </div>

    </div>
</div>

@endsection

