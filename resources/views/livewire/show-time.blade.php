<div class="text-lg mx-32">
    <ul class="flex flex-row md:flex-col border-b border-orange-500 border-opacity-50 h-10">
        <li class="md:mt-3 md:ml-6 py-2 hover:border-b-2 hover:border-orange-500 hover:text-orange-500">
            <a href="#" wire:click="changeTab('byMovie')">By Movie</a>
        </li>
        <li class="ml-16 md:mt-3 md:ml-6 py-2 hover:border-b-2 hover:border-orange-500 hover:text-orange-500">
            <a href="#" wire:click="changeTab('byCinema')">By Cinema</a>
        </li>
    </ul>
    @if($tab=="byMovie")
        <div class="grid grid-cols-3 gap-28 text-center pt-2 justify-items-center">
            <div class="w-84">
                <h4 class="bg-orange-700 py-1">Select Movie</h4>
                <ul class="">
                    @foreach ($movies as $movie)
                    <a wire:click="selectMovie({{$movie->id}})" class="cursor-pointer">
                        <li class="text-left border border-collapse border-gray-600">
                            <div class="inline-flex mx-5 mt-3">
                                <img src="{{asset('storage/img')}}/{{$movie->poster}}" alt="{{$movie->title}}" class="w-8 mr-5">
                                <span>{{$movie->title}}</span>
                            </div>
                        </li>
                    </a>
                    @endforeach
                </ul>
            </div>
            <div class="w-84 text-center">
                <h4 class="bg-orange-700 py-1">Select Cinema</h4>
                @if($selectedMovie)
                    <ul>
                        @foreach ($theaters as $theater)
                        <a wire:click="selectTheater({{$theater->id}})" class="cursor-pointer">
                            <li class="text-left border border-collapse border-gray-600">
                                <div class="ml-6 py-4">
                                    {{-- <img src="{{asset('storage/img')}}/{{$movie->poster}}" alt="{{$movie->title}}" class="w-8 mr-5"> --}}
                                    <span>{{$theater->theater_name}}</span>
                                </div>
                            </li>
                        </a>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="w-84">
                <h4 class="bg-orange-700 py-1">Select Session</h4>
                @if($sessions)
                    <ul>
                        {{-- {{dd($sessions)}} --}}
                        @foreach ($sessions as $dates)
                        <li class="text-left border border-collapse border-gray-600">
                            <div class="ml-3 py-3">
                                {{-- <img src="{{asset('storage/img')}}/{{$movie->poster}}" alt="{{$movie->title}}" class="w-8 mr-5"> --}}
                                <div>{{date('l, d/m/Y', strtotime($dates->first()->schedule->date))}}</div>
                                <div class="mt-3 ml-12 mr-8 grid grid-cols-3 gap-3 text-center">
                                    @foreach ($dates as $session)
                                        <span class="border border-white p-1">{{ date('H:i', strtotime($session->time_start))}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
        @else
        <div class="grid grid-flow-col gap-40 text-center pt-2">
            <div class="w-84">
                <h4 class="bg-orange-700 py-1">Select Movie</h4>
            </div>
            <div class="w-84">
                <h4 class="bg-orange-700 py-1">Select Cinema</h4>
            </div>
            <div class="w-84">
                <h4 class="bg-orange-700 py-1">Select Session</h4>
            </div>
        </div>
    @endif
</div>
