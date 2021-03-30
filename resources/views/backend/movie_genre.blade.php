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
                </div>
                <div>
                    <livewire:datatables-movie-genre searchable="title" exportable/>
                </div>
                {{-- <div>
                    <livewire:form-movie-edit-genre>
                </div> --}}
            </div>
        </div>
    </div>

    <div id="edit" class="grid grid-cols-1 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-extrabold text-lg">Movies - Genres</h1>
                </div>
                <div>
                    <livewire:form-movie-edit-genre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
