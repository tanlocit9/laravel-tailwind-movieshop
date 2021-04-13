<ul>
    @foreach ($theaters as $theater)
    <a wire:click="selectTheater({{$theater->id}})" class="cursor-pointer">
        <li class="text-left border border-collapse border-gray-600 hover:bg-gray-700">
            <div class="ml-6 py-4">
                {{-- <img src="{{asset('storage/img')}}/{{$movie->poster}}" alt="{{$movie->title}}" class="w-8 mr-5"> --}}
                <span>{{$theater->theater_name}}</span>
            </div>
        </li>
    </a>
    @endforeach
</ul>
