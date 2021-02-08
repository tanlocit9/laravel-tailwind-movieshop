@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg text-semibold">
                Popular Movies
            </h2>
            {{-- Grid --}}
            <div class="grid grid-cols-4 gap-8">
                {{-- Card --}}
                <div class="mt-8">
                    <a href="/movie/tiectrangmau">
                        <img src="{{asset('storage/img')}}TTM_poster.jpg" alt="Tiec trang mau" class="">
                    </a>
                    <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray-300">Tiệc trăng máu</a>
                    </div>
                    {{-- Movie Info --}}
                    <div >
                        <img class="inline text-orange-500 w-4 h-4 mb-1" src="/storage/img/star.png" alt="star">
                        <span>85%</span>
                        <span>|</span>
                        <span>Feb 20, 2020</span>
                    </div>
                    <div>
                        Action, Thriller, Comedy
                    </div>
                    {{-- End Movie Info --}}
                </div>
                {{-- End Card --}}
            </div>
            {{-- End Grid --}}
        </div>
    </div>
@endsection

