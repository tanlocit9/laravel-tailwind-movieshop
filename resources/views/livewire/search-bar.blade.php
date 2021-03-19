
<div class="relative ml-4">
    <input wire:model="search" type="text" class="text-black focus:outline-none focus:shadow-outline rounded-full pl-4" placeholder="Search movies..."/>
    <div class="absolute bg-white text-black w-full rounded-lg mt-1">
        <ul>
            @if($search!='')
                @forelse($movies as $movie)
                    <li class="pl-4">
                        <a href="{{route('show_movie',['movie'=>$movie])}}">{{ $movie->title }}</a>
                    </li>
                    @empty
                    <li class="pl-4">Found nothing with '{{$search}}'</li>
                @endforelse
            @endif
        </ul>
    </div>
</div>
