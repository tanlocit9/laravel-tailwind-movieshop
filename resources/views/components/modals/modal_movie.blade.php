<form action="{{route('movie_add')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10"> --}}
    <div class="max-w-md mx-auto">
        <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
            <div class="flex flex-col">
                <label class="leading-relaxed">Movie name</label>
                <input type="text" name="title"class="input-text sm:text-sm" placeholder="Movie name" required value="{{old('movie_name')}}">
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex flex-col">
                    <label class="leading-relaxed">Release day</label>
                    <div class="relative focus-within:text-gray-600 text-gray-400">
                        <svg class="absolute pl-1 pt-2 w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <input type="text" name="release" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="25/02/2020">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label class="leading-relaxed">Duration</label>
                    <input type="text" name="duration" class="input-text sm:text-sm" placeholder="00:00:00" required>
                </div>

                <div class="flex flex-col">
                    <label class="leading-relaxed">Age limit</label>
                    <input type="text" name="limit" class="input-text sm:text-sm" placeholder="Optional">
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex flex-col w-1/2">
                    <label class="leading-relaxed" for="country">Movie country</label>
                    <select name="country" id="country" class="input-text" required>
                        <option value="0">Select country</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col w-1/2">
                    <label class="leading-relaxed" for="country">Movie genre</label>
                    <select name="genre" id="genre" class="input-text" required>
                        <option value="0">Select main genre</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex flex-col w-full">
                    <label class="leading-relaxed">Movie Description</label>
                    <input type="text" name="description" class="input-text sm:text-sm" placeholder="Optional">
                </div>
            </div>
            <div class="flex flex-col">
                <label class="leading-relaxed">Poster</label>
                <label for="poster" id="poster-label" class="input-text sm:text-sm normal-case cursor-pointer hover:bg-gray-300 ">Select poster</label>
                <input hidden type="file" id="poster" name="poster" accept="image/*" class="input-text sm:text-sm">
                <img id="blah" src="#" alt="Not uploaded" name="poster"class="float-left h-20 invisible" />
            </div>
        </div>
        <div class="pt-4 flex items-center space-x-4">
            <div id="modal-close" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none cursor-pointer">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
            </div>
            <button type="submit" class="modal-create">Create</button>
        </div>
    </div>
</form>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            const image = $('#blah')
            image.attr('src', e.target.result);
            image.removeClass("invisible");
            // image.addClass("w-20 h-20");
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
    $("#poster").change(function() {
        filename = this.files[0].name
        readURL(this);
        $("#poster-label").text(filename)
    });
</script>
