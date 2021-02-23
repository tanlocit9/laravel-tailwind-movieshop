@extends('layouts.admin')

@section('content')
<!-- strat content -->
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <!-- best seller & traffic -->
    <div class="grid grid-cols-1 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-extrabold text-lg">admin</h1>
                    {{-- <a href="#" class="btn-gray text-sm">view all</a> --}}
                </div>
                <table class="text-left w-full mt-5 ">
                    <thead>
                        <tr>
                            <th>user name</th>
                            <th>email</th>
                            <th>role</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm normal-case">
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->role_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
@endsection
