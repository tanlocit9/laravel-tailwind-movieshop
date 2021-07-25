<div class="w-full flex items-center justify-center" x-data="modal()" x-cloak @open-payment-form.window="openModal()"
    @open-payment-form.window="closeModal()">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto h-full" style="background-color: rgba(0,0,0,0.5)"
            :class="{ 'fixed inset-0 z-10 flex items-center justify-center h-screen': open }">
            <!--Dialog-->
            <div class="text-gray-600 bg-white w-3/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6"
                x-ref="myModal" x-show="open" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
                <!--Title-->
                <!-- End Title-->
                <!-- content -->
                <div class=" mx-auto max-w-sm">
                    <h1 class="mb-6 pt-6 text-3xl"> Choose your pay mode !</h1>
                    @foreach ($payModes as $payMode)
                    <div class="pl-12">
                        <div class="flex items-center mr-4 mb-4">
                            <input id="{{$payMode->id}}" type="radio" name="radio" class="hidden" checked />
                            <label for="{{$payMode->id}}" class="flex items-center cursor-pointer text-xl"
                                wire:click="selectPayMode({{$payMode->id}})">
                                <span
                                    class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                                {{$payMode->description}}</label>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="w-full mx-auto py-4" x-on:click="closeModal()">
                    <button wire:click="book()"
                        class="bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Book
                    </button>
                    <button x-on:click="closeModal()"
                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow  float-right">
                        Cancel
                    </button>
                </div>
                <!--Footer-->
            </div>

            <!--/Dialog -->
        </div><!-- /Overlay -->
    </section>

</div>
