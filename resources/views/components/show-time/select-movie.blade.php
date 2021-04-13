<ul>
    @foreach ($movies as $movie)
    <a wire:click="selectMovie({{$movie->id}})" class="cursor-pointer">
        <li class="text-left border border-collapse border-gray-600 hover:bg-gray-700">
            <div class="inline-flex mx-5 mt-3 ">
                <img src="{{asset('storage/img')}}/{{$movie->poster}}" alt="{{$movie->title}}" class="w-8 mr-5">
                <span>{{$movie->title}}</span>
            </div>
        </li>
    </a>
    @endforeach
</ul>
