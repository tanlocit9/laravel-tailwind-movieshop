<span class="focus:outline-none">
    <button wire:model="id" id="modal-open" target="_blank" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
    </button>
    <!--Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-50">
        <div class="modal-overlay"></div>
        <div class="modal-container w-1/2 md:max-w-md">
            {{-- <div id="modal-close" class="modal-esc">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                <span class="text-sm">(Esc)</span>
            </div> --}}
            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <livewire:modal-genres-edit/>
            {{-- @switch($action)
                @case('Add')
                    @switch($title)
                        @case('movie')
                            @include('components.modals.modal_movie')
                            @break
                        @case('theater')
                            @include('components.modals.modal_theater')
                            @break
                        @case('genre')
                            @include('components.modals.modal_genre')
                            @break
                        @case('user')
                        @include('components.modals.modal_user')
                        @break
                            @default
                    @endswitch
                    @break
                @case('edit')
                    @switch($title)
                        @case('genre')
                            @include('livewire.modal.modal-edit-genres')
                            @break
                        @default
                    @endswitch
                    @break
                @default
            @endswitch --}}
            </div>
        </div>
    </div>
</span>
