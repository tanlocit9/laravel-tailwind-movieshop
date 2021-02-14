<span class="focus:outline-none">
    <button class="modal-open">Add</button>
    <!--Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
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
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                <p class="text-black text-2xl font-bold">Add new {{$title}}</p>
                <div id="modal-close" class="cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
                </div>
                <!--Body-->

                @switch($title)
                    @case('movie')
                        @include('components.modals.modal_movie')
                        @break
                    @case('theater')
                        @include('components.modals.modal_theater')
                        @break
                    @default

                @endswitch
            </div>
        </div>
    </div>
</span>
