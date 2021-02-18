<form action="{{route('genre_modify')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10"> --}}
    <div class="max-w-md mx-auto">
        <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
            <div class="flex flex-col">
                <label class="leading-relaxed">something</label>
                <input type="text" name="genre_name"class="input-text sm:text-sm" placeholder="Genre name" required value="{{old('movie_name')}}">
            </div>
            <div class="flex flex-col">
                <label class="leading-relaxed">description</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                    <input type="text" name="description" class="input-text sm:text-sm" placeholder="Genre description">
                </div>
            </div>
            <div class="pt-4 flex items-center space-x-4">
                <div id="modal-close" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none cursor-pointer">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                </div>
                <button type="submit" class="modal-create">Create</button>
            </div>
        </div>
    </div>
</form>
