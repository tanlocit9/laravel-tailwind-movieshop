<form action="{{route('genre_modify')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10"> --}}
    <div class="max-w-md mx-auto">
        <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
            <div class="flex items-center space-x-4">
                <div class="flex flex-col w-1/2">
                    <label class="leading-relaxed" for="movie">Choose movie</label>
                    <select name="movie" id="movie" class="input-text" required>
                        <option value="0">Select movie</option>
                            @foreach($movies as $movie)
                                <option value="{{$movie->id}}">{{$movie->movie_name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col w-1/2">
                    <label class="leading-relaxed" for="main_genre">Main genre</label>
                    <select disabled name="main_genre" id="main_genre" class="input-text" required value="0">
                        <option value="0">Choose movie first</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex flex-col w-1/2">
                    <label class="leading-relaxed" for="sub_genre">Sub genres available</label>
                    <select disabled name="sub_genre" id="sub_genre" class="input-text" required>
                        <option value="0">Choose movie first</option>
                        @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="show" class="flex flex-col w-1/2 invisible">
                    <label class="leading-relaxed" >Selected Sub Genres</label>
                </div>
            </div>
            <div class="pt-4 flex items-center space-x-4">
                <div id="modal-close" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none cursor-pointer">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                </div>
                <button type="submit" class="modal-create">Modify</button>
            </div>
        </div>
    </div>
</form>
