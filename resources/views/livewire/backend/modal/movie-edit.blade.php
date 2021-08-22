<div class="w-full flex items-center justify-center" x-data="modal()" x-cloak @open-movie-edit.window="openModal()"
    @close-movie-edit.window="closeModal()">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto h-full" style="background-color: rgba(0,0,0,0.5)"
            :class="{ 'fixed inset-0 z-10 flex items-center justify-center h-screen': open }">
            <!--Dialog-->
            <div class="text-gray-600 bg-white w-6/12 md:max-w-md mx-auto rounded shadow-lg pt-4 text-left px-6 pb-0"
                x-ref="myModal" x-show="open" x-transition:enter="ease-out duration-300" @click.away="closeModal()"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
                <!--Title-->
                @if($movie)
                <div class="text-red-600" wire:loading>
                    Saving changes.....
                </div>
                <form wire:submit.prevent='saveMovie' enctype="multipart/form-data">
                    <div class="w-full mx-auto">
                        <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
                            <div class="flex flex-col">
                                <label class="leading-relaxed">Movie title</label>
                                <input wire:model="title" type="text" name="title" class="input-text sm:text-sm"
                                    placeholder="Movie title" required value="{{old('movie_name')}}">
                            </div>
                            <div class="flex items-center space-x-3 ">
                                <div class="flex flex-col w-1/4">
                                    <label for="datepicker" class="leading-relaxed">Release day</label>
                                    <input type="date" wire:model='releaseDate' name="releaseDate"
                                        class="input-text sm:text-sm" placeholder="22-12-1999" required>
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <label class="leading-relaxed">Duration hours</label>
                                    <input type="number" wire:model="hours" name="hours" min="00" max="10"
                                        class="input-text sm:text-sm" placeholder="00" required>
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <label class="leading-relaxed">Duration Minutes</label>
                                    <input type="number" wire:model="minutes" name="minutes" min="00" max="59"
                                        class="input-text sm:text-sm" placeholder="00" required>
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <label class="leading-relaxed">Duration Secconds</label>
                                    <input type="number" wire:model="secconds" name="secconds" min="00" max="59"
                                        class="input-text sm:text-sm" placeholder="00" required>
                                </div>

                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex flex-col w-1/3">
                                    <label class="leading-relaxed">Age limit</label>
                                    <input wire:model="limit" type="number" name="limit" value="0" min="00" max="18"
                                        class="input-text sm:text-sm" placeholder="Optional">
                                </div>
                                <div class="flex flex-col w-1/3">
                                    <label class="leading-relaxed" for="countryId">Movie country</label>
                                    <select wire:model="countryId" name="countryId" id="countryId" class="input-text"
                                        required>
                                        <option value="0">Select country</option>
                                        @foreach($countries as $country)
                                        <option {{ strval($country->id) == strval($countryId)  ? 'selected' : '' }} value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col w-1/3">
                                    <label class="leading-relaxed" for="genreId">Movie genre</label>
                                    <select wire:model="genreId" name="genreId" id="genreId" class="input-text" required>
                                        <option value="0">Select main genre</option>
                                        @foreach($genres as $genre)
                                        <option {{ strval($genre->id) == strval($genreId)  ? 'selected' : '' }} value="{{$genre->id}}">{{$genre->genre_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex flex-col w-full">
                                    <label class="leading-relaxed">Movie Description</label>
                                    <input wire:model="description" type="text" name="description"
                                        class="input-text sm:text-sm" placeholder="Optional">
                                </div>
                            </div>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                                    <div class="h-full w-full text-center flex flex-col items-center justify-center">
                                        <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                            <img id="tempImg" class="has-mask h-36 object-center"
                                                src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                                alt="freepik image">
                                        </div>
                                        <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and
                                                drop</span>
                                            files here <br /> or select a file from your computer</p>
                                    </div>
                                    <input wire:model='poster' id="poster" accept="image/*" name="poster" type="file"
                                        class="hidden">
                                </label>
                            </div>
                        </div>
                        <div class="w-full mx-auto py-4">
                            <button type="submit"
                                class="cursor-pointer m-4 bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold py-2 px-4 rounded float-left">
                                Save
                            </button>
                            <a x-on:click="closeModal()"
                                class="cursor-pointer m-4 bg-gray-500 hover:bg-gray-700 focus:outline-none text-white font-bold py-2 px-4 rounded float-right">
                                Close
                            </a>
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
