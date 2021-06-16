
<div class="rounded shadow-md my-2 relative ml-4">
    <input wire:model="search" type="text" class="text-black focus:outline-none focus:ring rounded-full pl-4 py-1" placeholder="Search movies..."/>
    <div class="opacity-0 hover:opacity-100 absolute bg-white text-black w-full mt-1">
        <ul>
            @if($search!='')
                @forelse($movies as $movie)
                    <li class="pl-4">
                        <a class="cursor-pointer" wire:click.prevent="$emit('openSpecificMovie','{{$movie->slug}}')">{{ $movie->title }}</a>
                    </li>
                    @empty
                    <li class="pl-4">Found nothing with '{{$search}}'.</li>
                @endforelse
            @endif
        </ul>
    </div>
</div>
