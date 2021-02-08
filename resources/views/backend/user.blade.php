@extends('layouts.admin')

@section('content')
<!-- strat content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <!-- best seller & traffic -->
    <div class="grid grid-cols-1 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-extrabold text-lg">users</h1>
                    {{-- <a href="#" class="btn-gray text-sm">view all</a> --}}
                </div>
                <table class="text-left w-full mt-5 ">
                    <thead>
                        <tr>
                            <th>user name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>attr 1</th>
                            <th>attr 2</th>
                            <th>attr 3</th>
                            <th>attr 3</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        <tr class="">
                            <td>loc</td>
                            <td>0368823899</td>
                            <td>admin@gmail.com</td>
                            <td>attr 1</td>
                            <td>attr 2</td>
                        </tr>
                        <tr class="">
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
        <div class="card">
            <div class="card-body">
                <h2 class="font-bold text-lg mb-10">Recent Orders</h2>
                <!-- start a table -->
                <table class="table-fixed w-full">
                    <!-- table head -->
                    <thead class="text-left">
                        <tr>
                            <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">customer</th>
                            <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Product</th>
                            <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Invoice</th>
                            <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">price</th>
                            <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">status</th>
                        </tr>
                    </thead>
                    <!-- end table head -->
                    <!-- table body -->
                    <tbody class="text-left text-gray-600">
                        <!-- item -->
                        <tr>
                            <!-- name -->
                            <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center">
                                <div class="w-8 h-8 overflow-hidden rounded-full">
                                    <img src="{{asset('backend/img/user2.jpg" class="object-cover')}}">
                                </div>
                                <p class="ml-3 name-1">user name</p>
                            </th>
                            <!-- name -->
                            <!-- product -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                            <!-- product -->
                            <!-- invoice -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                            <!-- invoice -->
                            <!-- price -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                            <!-- price -->
                            <!-- status -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                            <!-- status -->
                        </tr>
                        <!-- item -->
                        <!-- item -->
                        <tr>
                            <!-- name -->
                            <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center ">
                                <div class="w-8 h-8 overflow-hidden rounded-full">
                                    <img src="{{asset('backend/img/user3.jpg" class="object-cover')}}">
                                </div>
                                <p class="ml-3 name-1">user name</p>
                            </th>
                            <!-- name -->

                            <!-- product -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                            <!-- product -->

                            <!-- invoice -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                            <!-- invoice -->

                            <!-- price -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                            <!-- price -->

                            <!-- status -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                            <!-- status -->

                        </tr>
                        <!-- item -->
                        <!-- item -->
                        <tr>
                            <!-- name -->
                            <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center ">
                                <div class="w-8 h-8 overflow-hidden rounded-full">
                                    <img src="{{asset('backend/img/user2.jpg" class="object-cover')}}">
                                </div>
                                <p class="ml-3 name-1">user name</p>
                            </th>
                            <!-- name -->

                            <!-- product -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                            <!-- product -->

                            <!-- invoice -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                            <!-- invoice -->

                            <!-- price -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                            <!-- price -->

                            <!-- status -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                            <!-- status -->
                        </tr>
                        <!-- item -->

                        <!-- item -->
                        <tr>
                            <!-- name -->
                            <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center ">
                                <div class="w-8 h-8 overflow-hidden rounded-full">
                                    <img src="{{asset('backend/img/user1.jpg" class="object-cover')}}">
                                </div>
                                <p class="ml-3 name-1">user name</p>
                            </th>
                            <!-- name -->

                            <!-- product -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                            <!-- product -->

                            <!-- invoice -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                            <!-- invoice -->

                            <!-- price -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                            <!-- price -->

                            <!-- status -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                            <!-- status -->
                        </tr>
                        <!-- item -->

                        <!-- item -->
                        <tr>
                            <!-- name -->
                            <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center ">
                                <div class="w-8 h-8 overflow-hidden rounded-full">
                                    <img src="{{asset('backend/img/user3.jpg" class="object-cover')}}">
                                </div>
                                <p class="ml-3 name-1">user name</p>
                            </th>
                            <!-- name -->

                            <!-- product -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                            <!-- product -->

                            <!-- invoice -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4"></span></th>
                            <!-- invoice -->

                            <!-- price -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2"></span></th>
                            <!-- price -->

                            <!-- status -->
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                            <!-- status -->

                        </tr>
                        <!-- item -->
                    </tbody>
                    <!-- end table body -->
                </table>
                <!-- end a table -->
            </div>
        </div>
    </div>
    <!-- end best seller & traffic -->
</div>
<!-- end content -->
@endsection
