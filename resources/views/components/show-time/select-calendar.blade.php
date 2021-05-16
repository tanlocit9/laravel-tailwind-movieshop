@if($calendars)
    <ul>
        {{-- {{dd($calendars)}} --}}
        @foreach ($calendars as $dates)
        <li class="text-left border border-collapse border-gray-600">
            <div class="ml-3 py-3">
                {{-- <img src="{{asset('storage/img')}}/{{$movie->poster}}" alt="{{$movie->title}}" class="w-8 mr-5"> --}}
                <div>{{date('l, d/m/Y', strtotime($dates->first()->schedule->date))}}</div>
                <div class="mt-3 ml-12 mr-8 grid grid-cols-3 gap-3 text-center"  >
                    @foreach ($dates as $calendar)
                    {{-- <a wire:click="$emit('openLoginForm')"class="border border-white p-1 cursor-pointer">{{ date('H:i', strtotime($calendar->time_start))}}</a> --}}
                            <a wire:click="$emit('openBookTicketForm','{{$movie->slug}}','{{$calendar}}')"class="border border-white p-1 cursor-pointer">{{ date('H:i', strtotime($calendar->time_start))}}</a>
                    @endforeach
                </div>
            </div>
        </li>
        @endforeach
    </ul>
@endif
