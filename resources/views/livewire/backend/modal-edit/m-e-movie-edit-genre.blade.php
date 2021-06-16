<div wire:poll class="mx-auto w-full bg-gray-100 flex items-center justify-center h-screen" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak @edit-movie-genres.window="showModal = true">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
            <!--Dialog-->
            <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                @if($movie)
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-black text-2xl font-bold">Editing {{$movie->title}} genres</p>
                    <div class="cursor-pointer z-50" @click="showModal = false">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!-- content -->

                <div class="max-w-lg mx-auto">
                    <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
                        <div class="flex items-center space-x-4">
                            <div class="flex flex-col w-1/2">
                                <label class="leading-relaxed" for="main_genre">Main genre</label>
                                <select wire:model="main_genre_id" wire:change='removeFocus' name="main_genre" id="main_genre" class="input-text">
                                    @foreach($genres as $genre)
                                        <option value="{{$genre->id}}"
                                            {{ strval($genre->id) == strval($main_genre_id)  ? 'selected' : '' }}
                                            >{{$genre->genre_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-6 flex flex-col w-1/4">
                                <button wire:click="editMainGenre" class="focus:outline-none inline-flex items-center justify-center w-15 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:ring hover:bg-indigo-800">
                                    <span class="pr-2">Edit</span>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div wire:loading wire:target="main_genre_id">
                                Updating main genre
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="flex flex-col w-1/2">
                                <label class="leading-relaxed" for="sub_genre">Sub genres available</label>
                                <select wire:model="sub_genre_id" name="sub_genre" id="sub_genre" class="input-text">
                                    @foreach($genres as $genre)
                                        <option
                                        value="{{$genre->id}}">{{$genre->genre_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-6 flex flex-col w-1/4">
                                <button wire:click="addSubGenre" class="focus:outline-none inline-flex items-center justify-center w-15 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:ring hover:bg-indigo-800">
                                    <span class="pr-2">Add</span>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div id="show" class="flex flex-col w-1/2 ">
                                <table>
                                    <thead>
                                        <th>
                                            Subgenres
                                        </th>
                                        <th>
                                            Delete
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($movie->sub_genre as $genre)
                                        <tr>
                                            <td>
                                                {{$genre->genre_name}}
                                            </td>
                                            <td>
                                                <button wire:click="deleteGenre({{ $genre->id }})" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div wire:loading.delay wire:target="deleteGenre({{ $genre->id }})">
                                Deleting genre...
                            </div>
                        </div>

                    </div>
                </div>

                @endif

                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="alert('Additional Action');">Action</button>
                    <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" @click="showModal = false">Close</button>
                </div>


            </div>
            <!--/Dialog -->
        </div><!-- /Overlay -->
    </section>

</div>

