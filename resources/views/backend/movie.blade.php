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
                    <div id="alert" class="invisible">

                    </div>
                    @include('components.modal',['title'=>$title])
                </div>
                <table class="text-left w-full mt-5 ">
                    <thead>
                        <tr>
                            <th>Movie Name</th>
                            <th>duration</th>
                            <th>release day</th>
                            <th>country</th>
                            <th>age limit</th>
                            <th>discription</th>
                            <th>details</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        <tr class="capitalize">
                            <td>Tiệc trăng máu</td>
                            <td>1h</td>
                            <td>Ngày nào đó</td>
                            <td>Việt Nam</td>
                            <td>16</td>
                            <td>
                                <button class="btn btn-edit" type="submit">View</button>
                            </td>
                            <td>
                                <button class="btn btn-edit" type="submit">Show More</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-5">
            <div class="card">
                <div class="card-body">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="font-extrabold text-lg">movies index</h1>
                        {{-- <a href="#" class="btn-gray text-sm">view all</a> --}}
                    </div>
                    <table class="text-left w-full mt-5 ">
                        <thead>
                            <tr>
                                <th>Movie Name</th>
                                <th>average rates</th>
                                <th>total views</th>
                                <th>sold ticket</th>
                                <th>revenue</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm normal-case">
                            <tr>
                                <td>Tiệc trăng máu</td>
                                <td>4/5</td>
                                <td>1999</td>
                                <td>1922</td>
                                <td>sh</td>
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
        </div>
    </div>
</div>

@if(Session::has('status'))
<script>
    alert('{{Session::get("type")." ".$title." ".Session::get("status")}}')
</script>
@endif
@endsection

