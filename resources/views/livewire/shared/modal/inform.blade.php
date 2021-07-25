<div class="w-full flex items-center justify-center" x-data="modal()" x-cloak @open-inform-modal.window="openModal()"
    @open-inform-modal.window="closeModal()">

    <section class="flex flex-wrap p-4 h-full items-center">
        <!--Overlay-->
        <div class="overflow-auto h-full" style="background-color: rgba(0,0,0,0.5)"
            :class="{ 'fixed inset-0 z-10 flex items-center justify-center h-screen': open }">
            <!--Dialog-->
            <div class=" bg-white w-3/12 md:max-w-md mx-auto rounded shadow-lg p-2 text-left" x-ref="myModal"
                x-show="open" x-transition:enter="ease-out duration-300" @click.away="closeModal()"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
                <div class=" rounded shadow m-4 text-center max-w-full p-0 text-3xl">
                    <div class="mb-4 text-red-400">
                        <h1>Inform Dialog</h1>
                    </div>
                    <div class="mb-8 text-green-400">
                        <p>{{$message}} {{$type}}</p>
                    </div>
                    <div class="flex justify-center text" x-on:click="closeModal()" wire:click="close()">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold py-2 px-4 rounded float-right">
                            Close
                        </button>

                    </div>
                </div>
            </div>

            <!--/Dialog -->
        </div><!-- /Overlay -->
    </section>

</div>
