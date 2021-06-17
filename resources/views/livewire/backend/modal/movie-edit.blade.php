<div class="w-full flex items-center justify-center" x-data="modal()" x-cloak @open-movie-edit.window="openModal()"
    @close-movie-edit.window="closeModal()">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto h-full" style="background-color: rgba(0,0,0,0.5)"
            :class="{ 'fixed inset-0 z-10 flex items-center justify-center h-screen': open }">
            <!--Dialog-->
            <div class="text-gray-600 bg-white w-5/12 md:max-w-md mx-auto rounded shadow-lg pt-4 text-left px-6 pb-0"
                x-ref="myModal" x-show="open" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
                <!--Title-->
                @if($movie)
                <div class="w-full mx-auto">
                    <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
                        <div class="flex flex-col">
                            <label class="leading-relaxed">Movie name</label>
                            <input type="text" name="title" class="input-text sm:text-sm" placeholder="Movie name"
                                required value="{{old('movie_name')}}">
                        </div>
                        <div class="flex items-center space-x-4 ">
                            <div class="flex flex-col">
                                <label for="datepicker" class="leading-relaxed">Release day</label>
                                <x-date-picker wire:model="releaseDate" id="datepicker"/>
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-relaxed">Duration</label>
                                <input type="text" name="duration" class="input-text sm:text-sm" placeholder="00:00:00"
                                    required>
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
                                <input type="text" name="description" class="input-text sm:text-sm"
                                    placeholder="Optional">
                            </div>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                                <div class="h-full w-full text-center flex flex-col items-center justify-center">
                                    <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                        <img class="has-mask h-36 object-center"
                                            src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                            alt="freepik image">
                                    </div>
                                    <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span>
                                        files here <br /> or select a file from your computer</p>
                                </div>
                                <input type="file" class="hidden">
                            </label>
                        </div>
                    </div>
                    <div class="pt-4 flex items-center space-x-4">
                        <div id="modal-close"
                            class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none cursor-pointer">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg> Cancel
                        </div>
                        <button type="submit" class="modal-create">Create</button>
                    </div>
                </div>
                </form>

                @endif
                <!-- End Title-->
                <!-- content -->

                <!--Footer-->
            </div>

            <!--/Dialog -->
        </div><!-- /Overlay -->
    </section>

</div>
