@extends('layouts.admin')
@section('content')
<!-- strat content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <!-- best seller & traffic -->
    <div class="grid grid-cols-1 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-extrabold text-lg">Movie calendar</h1>
                    {{-- <a href="#" class="btn-gray text-sm">view all</a> --}}
                    @include('components.modal',['title'=>"Add new movie"])
                    {{-- <input type="text" class="pl-3 outline-none rounded-full border border-gray-800 focus:shadow-outline"> --}}
                </div>
                <table class="left-5 text-left w-full mt-5">
                    <thead>
                        <tr>
                            <th>theater name</th>
                            <th>staff name</th>
                            <th>work today</th>
                            <th>months</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm ">
                        <tr>
                            <td>STU</td>
                            <td>Lộc</td>
                            <td>not</td>
                            <td>
                                <button class="btn btn-edit" type="submit">View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
@endsection

