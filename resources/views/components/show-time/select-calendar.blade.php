@if($calendars)
<ul>
    @foreach ($calendars as $dates)
    <li class="text-left border border-collapse border-gray-600">
        <div class="ml-3 py-3">
            <div>{{date('l, d/m/Y', strtotime($dates->first()->schedule->date))}}</div>
            <div class="mt-3 ml-12 mr-8 grid grid-cols-3 gap-3 text-center">
                @foreach ($dates as $calendar)
                <a wire:click="$emit('openBookTicketForm','{{$movie->slug}}','{{$calendar->id}}')"
                    class="border border-white p-1 cursor-pointer">{{ date('H:i', strtotime($calendar->time_start))}}</a>
                @endforeach
            </div>
        </div>
    </li>
    @endforeach
</ul>
@endif
