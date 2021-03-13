@extends('layouts.admin')

@section('content')
<!-- strat content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <!-- best seller & traffic -->
    <div class="grid grid-cols-1 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-extrabold text-lg">actors info</h1>
                    @include('components.modal',['action'=>'Add','title'=>$title])
                </div>
                <table class="text-left w-full mt-5 ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        @foreach($actors as $actor)
                        <tr class="capitalize">
                            <td>{{$actor->full_name}}</td>
                            @if($actor->gender)
                            <td>Nam</td>
                            @else
                            <td>Nữ</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$actors->links()}}
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-5">
            <div class="card">
                <div class="card-body">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="font-extrabold text-lg">staffs info</h1>
                    </div>
                    <table class="text-left w-full mt-5 ">
                        <thead>
                            <tr>
                                <th>actor Name</th>
                                <th>staff Name</th>
                                <th>email</th>
                                <th>day start</th>
                                <th>day work</th>
                                <th>faults</th>
                                <th>calendar</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm normal-case">
                            <tr>
                                <th>STU</th>
                                <td>Tiệc trăng máu</td>
                                <td>4/5</td>
                                <td>1999</td>
                                <td>1922</td>
                                <td>sh</td>
                                <td>
                                    <button class="btn btn-edit" type="submit">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td>loc</td>
                                <td>0368823899</td>
                                <td>admin@gmail.com</td>
                                <td>attr 1</td>
                                <td>attr 2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
