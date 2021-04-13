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
