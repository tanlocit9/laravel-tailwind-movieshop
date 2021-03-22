@extends('layouts.admin')

@section('content')
<!-- strat content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <!-- best seller & traffic -->
    <div class="grid grid-cols-1 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-extrabold text-lg">Theaters info</h1>
                    @include('components.modal',['action'=>'Add','title'=>$title])
                </div>
                <livewire:datatables-theater  exportable/>
                {{-- <table class="text-left w-full mt-5">
                    <thead>
                        <tr>
                            <th>theater Name</th>
                            <th>address</th>
                            <th>phone</th>
                            <th>manager</th>
                            <th>manager phone</th>
                            <th>staff</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        @foreach($theaters as $theater)
                        <tr class="capitalize">
                            <td>{{$theater->theater_name}}</td>
                            <td>{{$theater->theater_address}}</td>
                            <td>{{$theater->theater_address}}</td>
                            <td>Việt Nam</td>
                            <td>16</td>
                            <td>16</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$theaters->links()}}
                </div> --}}
            </div>
        </div>
@endsection
